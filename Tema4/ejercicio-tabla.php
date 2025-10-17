<style>
    table{
        border: 1px solid black;
        border-collapse: collapse;
    }
    th{
        border: 1px solid black;
    }
    td{
        border: 1px solid black;
        text-align: center;
        padding: 10px;
    }
</style>
 
<table>
    <th>Departamento</th>
    <th>1er</th>
    <th>2nd</th>
    <th>3er</th>
    <th>Total</th>
    <?php $suma = 0; $media = 0;?>
    <tr>
        <td>Informatica</td>
        <?php for ($i=0; $i < 3; $i++) { ?> 
            <td>
                <?php echo $money = rand(15000,20000);
                $suma += $money;?>
            </td>
        <?php }?>
        <td>    
            <?php echo $suma; 
            $media = $suma; 
            $suma = 0;?>
        </td>
    </tr>
    <tr>
        <td>Electronica</td>
        <?php for ($i=0; $i < 3; $i++) { 
            echo "<td>".$money = rand(12000,15000)."</td>";
            $suma += $money;
        }?>
        <td>    
                <?php echo $suma; 
                $media += $suma; 
                $suma = 0; ?>
        </td>
    </tr>
    <tr>
        <td>Robotica</td>
        <?php for ($i=0; $i < 3; $i++) { 
            echo "<td>".$money = rand(10000,12000)."</td>";
            $suma += $money;
        }?>
        <td>    
            <?php echo $suma; 
            $media += $suma; 
            $suma = 0; ?>
        </td>
    </tr>
    <tr>
        <td colspan="5">La media anual es de: <?php echo round($media/3)?></td>
    </tr>
</table>