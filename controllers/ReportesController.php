<?php

require_once 'fpdf/fpdf.php';

class reportesController{

    private $db;
    
    #Database Connection
    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function index(){
        
        $id_park = $_SESSION['estacionamiento']->id;
        
        $sql = "SELECT persons.nombre, persons.apellido, cars.matricula, inputs.estado, inputs.entrada, inputs.salida, inputs.tarifa_cobrada,
            TIMESTAMPDIFF(HOUR, inputs.entrada, inputs.salida) AS tiempo
            FROM inputs INNER JOIN cars 
            ON inputs.id_car = cars.id 
            INNER JOIN persons
            ON cars.id_person = persons.id
            WHERE id_park = '$id_park' AND inputs.estado = 0 ORDER BY inputs.entrada DESC;";

        $result = $this->db->query($sql);

        #Contructor
        $pdf = new FPDF('L', 'mm', 'A4');
        $pdf->AliasNbPages();
        $pdf->AddPage();

        #Diseño
        $pdf->Image(base_url.'assets/images/car_lot.png', 40, 5, 25 );
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(30);
        $pdf->Cell(120,10, 'Historial de Salidas Hoy',0,0,'C');
        $pdf->Ln(30);
        #Fin Diseño

        $pdf->SetFillColor(232,232,232);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(35,6,'Nombre',1,0,'C');
        $pdf->Cell(35,6,'Apellidos',1,0,'C');
        $pdf->Cell(25,6,'Matricula',1,0,'C');
        $pdf->Cell(60,6,'Entrada',1,0,'C');
        $pdf->Cell(60,6,'Salida',1,0,'C');
        $pdf->Cell(17,6,'Tiempo',1,0,'C');
        $pdf->Cell(17,6,'Tarifa',1,0,'C');
        $pdf->Cell(17,6,'Total $',1,1,'C');
        
        $pdf->SetFont('Arial','',10);
        
        $acum = 0;
        while($row = $result->fetch_assoc())
        {
            $pdf->Cell(35,6,utf8_decode($row['nombre']),1,0,'C');
            $pdf->Cell(35,6,utf8_decode($row['apellido']),1,0,'C');
            $pdf->Cell(25,6,utf8_decode($row['matricula']),1,0,'C');
            $pdf->Cell(60,6,utf8_decode($row['entrada']),1,0,'C');
            $pdf->Cell(60,6,utf8_decode($row['salida']),1,0,'C');
            $tiempo = (int)utf8_decode($row['tiempo']);
            $tiempo += 1;
            $pdf->Cell(17,6,$tiempo,1,0,'C');
            $pdf->Cell(17,6,utf8_decode($row['tarifa_cobrada']),1,0,'C');

            $costo = (int)utf8_decode($row['tarifa_cobrada']);
            $total = $tiempo * $costo;
            $total -=10; 
            
            $pdf->Cell(17,6,$total,1,1,'C');
            $acum += $total;
        }
        $pdf->Cell(215,8,'Corte de Caja',1,0,'C');
        $pdf->Cell(51,8,"$$acum",1,0,'C');

        $pdf->Output();
    }

    public function reservas(){
        
        $id_park = $_SESSION['estacionamiento']->id;
        
        $sql = "SELECT * FROM reservas INNER JOIN persons ON reservas.id_person = persons.id
            WHERE reservas.id_park = '$id_park' AND (reservas.estado = 'Pagada' OR reservas.estado = 'Terminada')
            ORDER BY reservas.entrada DESC;";

        $result = $this->db->query($sql);

        #Contructor
        $pdf = new FPDF('L', 'mm', 'A4');
        $pdf->AliasNbPages();
        $pdf->AddPage();

        #Diseño
        $pdf->Image(base_url.'assets/images/car_lot.png', 40, 5, 25 );
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(30);
        $pdf->Cell(120,10, 'Ganancias de Reservas',0,0,'C');
        $pdf->Ln(30);
        #Fin Diseño

        $pdf->SetFillColor(232,232,232);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(35,6,'Nombre',1,0,'C');
        $pdf->Cell(50,6,'Apellidos',1,0,'C');
        $pdf->Cell(60,6,'Entrada',1,0,'C');
        $pdf->Cell(25,6,'Estado',1,0,'C');
        $pdf->Cell(25,6,'Hora Arrivo',1,0,'C');
        $pdf->Cell(35,6,'Contacto',1,0,'C');
        $pdf->Cell(17,6,'Costo',1,1,'C');
        
        
        $pdf->SetFont('Arial','',10);
        
        $costo = (int)10;
        $acum = 0;
        while($row = $result->fetch_assoc())
        {
            $pdf->Cell(35,6,utf8_decode($row['nombre']),1,0,'C');
            $pdf->Cell(50,6,utf8_decode($row['apellido']),1,0,'C');
            $pdf->Cell(60,6,utf8_decode($row['entrada']),1,0,'C');
            $pdf->Cell(25,6,utf8_decode($row['estado']),1,0,'C');
            $pdf->Cell(25,6,utf8_decode($row['hra_arrivo']),1,0,'C');
            $pdf->Cell(35,6,utf8_decode($row['telefono']),1,0,'C');
            $pdf->Cell(17,6,"$$costo.00",1,1,'C');
            

            $acum += $costo;
        }
        $pdf->Cell(195,8,'Corte de Caja',1,0,'C');
        $pdf->Cell(52,8,"$$acum",1,0,'C');

        $pdf->Output();
    }

    public function reservas_user(){
        
        $id_person = $_SESSION['automovilista']->id;
        
        $sql = "SELECT * FROM reservas INNER JOIN persons ON reservas.id_person = persons.id
                INNER JOIN parks ON reservas.id_park = parks.id
                    WHERE reservas.id_person = '$id_person' AND (reservas.estado = 'Pagada' OR reservas.estado = 'Terminada')
                    ORDER BY reservas.entrada DESC;";

        $result = $this->db->query($sql);

        #Contructor
        $pdf = new FPDF('L', 'mm', 'A4');
        $pdf->AliasNbPages();
        $pdf->AddPage();

        #Diseño
        $pdf->Image(base_url.'assets/images/car_lot.png', 40, 5, 25 );
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(30);
        $pdf->Cell(120,10, 'Ganancias de Reservas',0,0,'C');
        $pdf->Ln(30);
        #Fin Diseño

        $pdf->SetFillColor(232,232,232);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(35,6,'Nombre',1,0,'C');
        $pdf->Cell(50,6,'Apellidos',1,0,'C');
        $pdf->Cell(50,6,'Estacionamiento',1,0,'C');
        $pdf->Cell(60,6,'Entrada',1,0,'C');
        $pdf->Cell(25,6,'Estado',1,0,'C');
        $pdf->Cell(25,6,'Hora Arrivo',1,0,'C');
        $pdf->Cell(17,6,'Costo',1,1,'C');
        
        
        $pdf->SetFont('Arial','',10);
        
        $costo = (int)10;
        $acum = 0;
        while($row = $result->fetch_assoc())
        {
            $pdf->Cell(35,6,utf8_decode($row['nombre']),1,0,'C');
            $pdf->Cell(50,6,utf8_decode($row['apellido']),1,0,'C');
            $pdf->Cell(50,6,utf8_decode($row['nombre_park']),1,0,'C');
            $pdf->Cell(60,6,utf8_decode($row['entrada']),1,0,'C');
            $pdf->Cell(25,6,utf8_decode($row['estado']),1,0,'C');
            $pdf->Cell(25,6,utf8_decode($row['hra_arrivo']),1,0,'C');
            $pdf->Cell(17,6,"$$costo.00",1,1,'C');
            

            $acum += $costo;
        }
        $pdf->Cell(210,8,'Total de pagos online',1,0,'C');
        $pdf->Cell(52,8,"$$acum",1,0,'C');

        $pdf->Output();
    }
}