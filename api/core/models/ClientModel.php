<?php

require_once '../helpers/Connection.php';

class ClientModel extends Connection
{

    public function consult($num)
    {
        $connection = parent::connect();
        try {
            $rowpaper = 5;
            $page = 1 + $num;
            $page = $page - 1;
            $p = $page * $rowpaper;
            $query = 'SELECT * FROM cliente limit ' . $p . ', ' . $rowpaper;
            $data =  $connection->query($query, PDO::FETCH_ASSOC)->fetchAll();
            return $data;
        } catch (Exception $e) {
            $array = [
                'message' => 'Error al ingresar una Accion',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }

    public function consultNum()
    {
        $connection = parent::connect();
        try {
            $query = 'SELECT count(*) as num FROM cliente';
            $data =  $connection->query($query, PDO::FETCH_ASSOC)->fetchAll();
            return $data;
        } catch (Exception $e) {
            $array = [
                'message' => 'Error al obtener registros',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }

    public function createClient($cliente, $giro, $numeronit, $numregistro, $id_muni, $telefono, $fax, $correo, $saldo_acumu, $limite_credito, $id_forma, $diascredito, $cuenta, $aplicarenta, $vendedor, $ultimopago, $creadopor, $fechacreacion, $idcli)
    {
        $conexion = parent::connect();
        try {
            $query = 'INSERT INTO cliente(cliente, giro, numero_nit, numero_registro, id_muni, telefono, numero_fax, correo, saldo_acumu, limite_credito, id_forma, dias_credito, id_cuenta, aplica_reten, codigo_vendedor, ultifechapago, creadopor, fechacreacion, id_tipocli) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
            $conexion->prepare($query)->execute(array($cliente, $giro, $numeronit, $numregistro, $id_muni, $telefono,  $fax, $correo, $saldo_acumu, $limite_credito, $id_forma, $diascredito, $cuenta, $aplicarenta, $vendedor, $ultimopago, $creadopor, $fechacreacion, $idcli));
            $array = [
                'message' => 'He insertado un registro',
                'type' => 'success',
                'specificMessage' => $conexion
            ];
            return json_encode($array);
        } catch (Exception $e) {
            $array = [
                'message' => 'Error al ingresar un registro',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }

    public function updateClient($cliente, $giro, $numeronit, $numregistro, $id_muni, $telefono, $fax, $correo, $saldo_acumu, $limite_credito, $id_forma, $diascredito, $cuenta, $aplicarenta, $vendedor, $ultimopago, $creadopor, $fechacreacion, $idcli,$id)
    {
        $conexion = parent::connect();
        try {
            $query = 'UPDATE cliente SET cliente=?, giro=?, numero_nit=?, numero_registro=? ,id_muni=?, telefono=?, numero_fax=?, correo=?,saldo_acumu=?, limite_credito=?, id_forma=?, dias_credito=?, id_cuenta=?, aplica_reten=?, codigo_vendedor=?, ultifechapago=?, creadopor=?, fechacreacion=?, id_tipocli=? WHERE id_cliente=?';
            $conexion->prepare($query)->execute(array($cliente, $giro, $numeronit, $numregistro, $id_muni, $telefono, $fax, $correo, $saldo_acumu, $limite_credito, $id_forma, $diascredito, $cuenta, $aplicarenta, $vendedor, $ultimopago, $creadopor, $fechacreacion, $idcli, $id));
            $array = [
                'message' => 'He actualizado un registro',
                'type' => 'success',
                'specificMessage' => $conexion
            ];
            return json_encode($array);
        } catch (Exception $e) {
            $array = [
                'message' => 'Error al actualizar un registro',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }

    public function deleteClients($id)
    {
        $conexion = parent::connect();
        try {
            $query = 'DELETE FROM cliente WHERE id_cliente=?';
            $conexion->prepare($query)->execute(array($id));
            $array = [
                'message' => 'He borrado un registro',
                'type' => 'success',
                'specificMessage' => $conexion
            ];
            return json_encode($array);
        } catch (Exception $e) {
            $array = [
                'message' => 'Error al borrar un registro',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }
}
