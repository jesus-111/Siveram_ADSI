<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Formulario</title>

	</head>
	<body>
        <div>
            <?php
            if (isset($_GET['formulario']))
                {
                $arr_form = explode(",", $_GET['formulario']);
                require_once ('../../Data/m_' . $arr_form[0] . '.php');
                $entity = new $arr_form[0]();
                $get = 'get_' . $arr_form[0];
                $lista = $entity->$get();
                $arr = explode(",", $lista);
                echo "<table id='select' class='display' cellspacing='0'><thead><tr>";
                foreach ($arr as $obj)
                    {
                    echo '<th>' . $obj . '</th>';
                }
                echo "</tr></thead><tboby>";
                require_once ('../../Controllers/' . $arr_form[0] . '.php');
                $class = new $arr_form[1]();
                $params = "0,";
                $parametros = "";
                for ($x = 0; $x < count($arr); $x++) {
                    $parametros .= $params;
                }
                $log = $class->$arr_form[2](0, 4, $parametros);
                echo "</tboby></table>";
            }
            ?>
        </div>
    </body>
    <script type="text/javascript">        
    </script>
</html>
