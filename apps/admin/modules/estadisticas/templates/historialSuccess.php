<?php
/*** mysql hostname ***/
$hostname = 'localhost';

/*** mysql username ***/
$username = 'paranoid';

/*** mysql password ***/
$password = 'my123';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=asteriskcdrdb", $username, $password);
    /*** echo a message saying we have connected ***/
    $sql = "SELECT calldate, clid, dst, duration FROM cdr ORDER BY calldate desc LIMIT 500";


} catch (PDOException $e) {

}
?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#historial').dataTable( {

        } );
    } );
</script>
<table id="historial">
    <thead>
    <th>Fecha</th>
    <th>Origen</th>
    <th>Destino</th>
    <th>Duraci&oacute;n (en seg)</th>
    </thead>
    <?php foreach ($dbh->query($sql) as $row) { ?>
    <tr>
        <td>
            <?php echo $row['calldate'] ?>
        </td>
        <td>
            <?php echo $row['clid'] ?>
        </td>
        <td>
            <?php echo $row['dst'] ?>
        </td>
        <td>
            <?php echo $row['duration'] ?>
        </td>
    </tr>
    <?php } ?>
</table>