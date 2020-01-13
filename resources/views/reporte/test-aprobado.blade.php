@php
    Fpdf::AddPage('P','Letter');
    Fpdf::SetFont('Courier', 'B', 18);

    Fpdf::Image('./images/logo.png',20,10,30,30);

    Fpdf::SetMargins(10, 70, 0);
    Fpdf::SetFont('Arial', 'B', 20);

    Fpdf::cell(160, 15, '', 0, 0, 'R', false);
    Fpdf::cell(30, 25, $test_user['nota'].'', 1, 1, 'C', false);
    Fpdf::SetFont('Arial', 'B', 8);
    Fpdf::cell(160, 6, '', 0, 0, 'R', false);
    Fpdf::cell(30, 6, utf8_decode('NOTA'),0, 1, 'C', false);



    Fpdf::SetFont('Arial', 'B', 20);
    Fpdf::cell(0, 15, utf8_decode("EVALUACIÓN"), 0, 1, 'C', false);
    // datos del cliente

    Fpdf::SetFont('Arial', '', 16);
    Fpdf::cell(5, 10, "", 0, 0, 'C', false);
    Fpdf::cell(100, 10, "Datos Personales", 0, 1, 'L', false);

    Fpdf::SetFont('Arial', '', 10);
    Fpdf::ln(3);

    Fpdf::cell(5, 8, "", 0, 0, 'C', false);
    Fpdf::cell(35, 8, "Postulante: ", 0, 0, 'L', false);
    Fpdf::SetFillColor(225,221,124);
    Fpdf::cell(145, 8, utf8_decode($user->nombres.' '.$user->apellido_paterno.' '.$user->apellido_materno), 0, 1, 'C', true);

    Fpdf::ln(2);
    Fpdf::cell(5, 8, "", 0, 0, 'C', false);
    Fpdf::cell(35, 8, "Cargo a Postular: ", 0, 0, 'L', false);
    Fpdf::SetFillColor(225,221,124);
    Fpdf::cell(145, 8, strtoupper($user->cargo_descripcion), 0, 1, 'C', true);

    Fpdf::ln(2);
    Fpdf::cell(5, 8, "", 0, 0, 'C', false);
    Fpdf::cell(35, 8, "Carnet Identidad", 0, 0, 'L', false);
    Fpdf::SetFillColor(225,221,124);
    Fpdf::cell(145, 8, $user->numero_carnet, 0, 1, 'C', true);

    Fpdf::ln(5);
    $count=1;
    Fpdf::SetFont('Arial', '', 16);
    Fpdf::cell(5, 8, "", 0, 0, 'C', false);
    Fpdf::cell(100, 8, utf8_decode("Datos de la Evaluación:"), 0, 1, 'L', false);

    Fpdf::SetFont('Arial', '', 10);
    foreach ($test_user['respuestas'] as $respuesta_user){
        Fpdf::ln(2);
        Fpdf::cell(5, 8, "", 0, 0, 'C', false);
        Fpdf::SetTextColor(0,0,0);
        Fpdf::multicell(190, 8, $count .". ".utf8_decode($respuesta_user['pregunta']['pregunta_titulo']), 0, 'L', 0);

        if($respuesta_user['correcto']){
            Fpdf::cell(20, 8, "", 0, 0, 'C', false);
            Fpdf::SetTextColor(0,41,41);
            Fpdf::multicell(165, 8, utf8_decode($respuesta_user['respuesta']['respuesta_descripcion']), 0, 'L', 0);
        }
        else{
            Fpdf::cell(20, 8, "", 0, 0, 'C', false);
            Fpdf::SetTextColor(255,130,92);
            Fpdf::multicell(165, 8, utf8_decode($respuesta_user['respuesta']['respuesta_descripcion']), 0, 'L', 0);
        }
        $count++;
    }
    Fpdf::SetFont('Arial', 'I', 12);

/*    Fpdf::ln(7);*/
    Fpdf::SetTextColor(231,168,17);
    Fpdf::cell(190, 8, "Mi persona cuenta con disponibilidad total de tiempo para viajes al interior del departamento.", 0, 1, 'C', false);
    Fpdf::ln(1);
    Fpdf::cell(190, 8, utf8_decode("Presentar este documento en oficinas de Recursos Humanos de SERECÍ - ORURO"), 0, 1, 'C', false);

    Fpdf::SetFont('Arial', '', 8);
    Fpdf::SetTextColor(0,0,0);
    Fpdf::SetMargins(15, 50, 0);
    Fpdf::SetLineWidth(0.1);
    //Fpdf::Line(90,180+($count*18),140,180+($count*18));
    Fpdf::ln(50);
    Fpdf::cell(0, 4, utf8_decode($user->nombres.' '.$user->apellido_paterno.' '.$user->apellido_materno), 0, 1, 'C', false);
    Fpdf::cell(0, 4, "POSTULANTE", 0, 1, 'C', false);

    Fpdf::SetTitle("Solicitud".date("Ymd H:i:s"));
    Fpdf::Output("I","Solicitud".date("Ymd H:i:s").".pdf");
    exit;
@endphp
