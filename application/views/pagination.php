<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url() ?>assests/css/dataTables.min.css">
    <style>
        .container {
            margin-left: 250px;
            margin-top: 100px;
        }
    </style>
</head>

<body>
    <table id="listing" class="table-hover table-bordered">
        <thead>
            <tr style="background:#CCC">
                <th> id</th>
                <th> First Name </th>
                <th> Last Name </th>
                <th>Email</th>
                <th>Date of Birth</th>
                <th>Added Date</th>
            </tr>
        </thead>
    </table>
    <input type="hidden" id="Id" value="<?= base_url() ?>">
</body>
<script src="<?= base_url() ?>assests/js/jquery.js"></script>
<script src="<?= base_url() ?>assests/js/dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assests/js/datatable.js"></script>

</html>