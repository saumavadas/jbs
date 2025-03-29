<!DOCTYPE html>
<html>
<head>
<title>Tax Invoice</title>
<style>
body {
    font-family: sans-serif;
    margin: 20px;
}
.invoice-container {
    width: 800px;
    margin: 0 auto;
    border: 1px solid #ddd;
    padding: 20px;
    position: relative;
}
.header {
    text-align: center;
    margin-bottom: 20px;
}
.header h2 {
    margin: 0;
}
.invoice-details {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}
.info-section {
    margin-bottom: 20px;
}
.info-section label {
    display: block;
    margin-bottom: 5px;
}
.info-section input {
    width: 100%;
    padding: 5px;
    border: 1px solid #ccc;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}
th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}
th {
    background-color: #f2f2f2;
}
.totals {
    text-align: right;
    margin-bottom: 20px;
}
.footer {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
}
.free-corner {
    position: absolute;
    top: 10px;
    right: 10px;
    background-color: lightgray;
    padding: 5px 10px;
}

.vyapar-logo {
  text-align: right;
  margin-top: 20px;
}

.vyapar-logo img {
  height: 30px;
}
</style>
</head>
<body>

<?php

?>

<div class="invoice-container">
    <div class="free-corner">Free</div>
    <div class="header">
        <h2>TAX INVOICE</h2>
    </div>
    <div class="invoice-details">
        <div>
            <label>INVOICE NO:</label>
            {{ $invoice->invoice_number }}
        </div>
        <div>
            <label>DATE:</label>
            {{ $invoice->date_of_invoice }}
        </div>
    </div>
    <div class="info-section">
        <label>Name:</label>
        {{ $invoice->customer_name }}
        <label>Phone:</label>
        {{ $invoice->phone }}
    </div>
    <!--div class="info-section">
        <label>Party Details:</label>
        <label>Address:</label>
        <input type="text">
        <label>GSTIN:</label>
        <input type="text">
    </div-->

    <table>
        <thead>
            <tr>
                <th>Particulars (Descriptions & Specifications)</th>
                <th>HSN / SAC Code</th>
                <th>Qty</th>
                <th>Rate</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="number"></td>
                <td><input type="number" step="0.01"></td>
                <td><input type="number" step="0.01"></td>
            </tr>
            <tr>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="number"></td>
                <td><input type="number" step="0.01"></td>
                <td><input type="number" step="0.01"></td>
            </tr>
            <tr>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="number"></td>
                <td><input type="number" step="0.01"></td>
                <td><input type="number" step="0.01"></td>
            </tr>
            <tr>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="number"></td>
                <td><input type="number" step="0.01"></td>
                <td><input type="number" step="0.01"></td>
            </tr>
        </tbody>
    </table>

    <div class="totals">
        <label>Total:</label>
        <input type="number" step="0.01">
        <br>
        <label>CGST @ <input type="number" style="width: 50px;"> %:</label>
        <input type="number" step="0.01">
        <br>
        <label>SGST @ <input type="number" style="width: 50px;"> %:</label>
        <input type="number" step="0.01">
        <br>
        <label>Grand Total:</label>
        <input type="number" step="0.01">
    </div>

    <div class="info-section">
        <label>Warranty related Terms & Conditions</label>
        <ol>
            <li><input type="text"></li>
            <li><input type="text"></li>
            <li><input type="text"></li>
            <li><input type="text"></li>
        </ol>
    </div>

    <div class="info-section">
        <label>Total Amount in Words:</label>
        <input type="text">
    </div>

    <div class="footer">
        <div>
            <label>For</label>
            <br>
            <label>Authorized Signature</label>
        </div>
    </div>
</div>

</body>
</html>        
        