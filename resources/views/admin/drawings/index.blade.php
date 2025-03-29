<x-admin>
    @section('title')
        {{ 'Create Customer' }}
    @endsection
    <style>
        canvas { border: 1px solid black; }
    </style>
</head>
<body>

    <canvas id="whiteboard" width="800" height="500"></canvas>
    <br>
    <button id="clearCanvas">Clear</button>
    <button id="saveImage">Save Drawing</button>
    @section('js')
    <script src="{{ asset('admin/plugins/fabric/fabric.min.js') }}"></script>
    <script>
        var canvas = new fabric.Canvas('whiteboard');
        canvas.isDrawingMode = true; // Enable freehand drawing
        canvas.freeDrawingBrush.width = 3; // Set brush thickness
        canvas.freeDrawingBrush.color = "black"; // Set brush color

        // Clear Canvas
        document.getElementById('clearCanvas').addEventListener('click', function () {
            canvas.clear();
        });

        // Save Image
        document.getElementById('saveImage').addEventListener('click', function () {
            var imageData = canvas.toDataURL("image/png"); // Convert canvas to Base64 image

            fetch('drawings/save-drawing', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ image: imageData })
            })
            .then(response => response.json())
            .then(data => alert("Drawing saved successfully!"))
            .catch(error => alert("Error saving drawing!"));
        });
    </script>
@endsection
</x-admin>
