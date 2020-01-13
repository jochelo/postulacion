@php
    Fpdf::AddPage('P','Letter');
    Fpdf::SetFont('Courier', 'B', 18);

    Fpdf::Image('./images/logo.png',20,10,20,20);
    Fpdf::SetMargins(10, 70, 0);
    Fpdf::cell(0, 15, "", 0, 0, 'C', false);

    Fpdf::ln(5);

    Fpdf::SetFont('Arial', 'B', 20);
    Fpdf::SetMargins(15, 50, 0);
    Fpdf::cell(0, 20, utf8_decode("EVALUACIÓN"), 0, 1, 'C', false);
    // datos del cliente

    Fpdf::SetFont('Arial', '', 16);
    Fpdf::cell(5, 8, "", 0, 0, 'C', false);
    Fpdf::cell(100, 8, "Datos Personales", 0, 0, 'L', false);

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
    Fpdf::cell(145, 8, $user->cargo_descripcion, 0, 1, 'C', true);

    Fpdf::ln(2);
    Fpdf::cell(5, 8, "", 0, 0, 'C', false);
    Fpdf::cell(35, 8, "Carnet Identidad", 0, 0, 'L', false);
    Fpdf::SetFillColor(225,221,124);
    Fpdf::cell(145, 8, $user->numero_carnet, 0, 1, 'C', true);

    Fpdf::ln(5);
    $count=1;
    $respuesta_user={
        {
            'pregunta': 'quien eres?',
            'respueta': 'soy yo',
            'correcto':1
        },
        {
            'pregunta': 'quien eres?',
            'respueta': 'soy yo',
            'correcto':1
        },
        {
            'pregunta': 'quien eres?',
            'respueta': 'soy yo',
            'correcto':0
        },
    };
    Fpdf::SetFont('Arial', '', 16);
    Fpdf::cell(5, 8, "", 0, 0, 'C', false);
    Fpdf::cell(100, 8, "Datos de la Evaluación:", 0, 0, 'L', false);

    Fpdf::SetFont('Arial', '', 10);
    foreach ($respuestas_user as $respuesta_user){
        Fpdf::ln(2);
        Fpdf::cell(5, 8, "", 0, 0, 'C', false);
        Fpdf::multicell(35, 8, $count .". ".$respuesta_user->pregunta, 0, 'L', 0);

        if($respuestas_user->correcto){
            Fpdf::cell(10, 8, "", 0, 0, 'C', false);
            Fpdf::SetFillColor(91,255,89);
            Fpdf::multicell(40, 8, $respuesta_user->respuesta, 0, 'L', 0);
        }
        else{
            Fpdf::cell(10, 8, "", 0, 0, 'C', false);
            Fpdf::SetFillColor(255,130,92);
            Fpdf::multicell(40, 8, $respuesta_user->respuesta, 0, 'L', 0);
        }
    }

    Fpdf::SetFont('Arial', 'I', 12);

    Fpdf::ln(7);
    Fpdf::SetTextColor(231,168,17);
    Fpdf::cell(190, 10, "Mi persona cuenta con disponibilidad total de tiempo para viajes al interior del departamento.", 0, 1, 'C', false);
    Fpdf::ln(3);
    Fpdf::cell(190, 10, "Presentar este Documento en oficinas de Recursos Humanos de SERECI - ORURO", 0, 1, 'C', false);

    Fpdf::SetTitle("Solicitud".date("Ymd H:i:s"));
    Fpdf::Output("I","Solicitud".date("Ymd H:i:s").".pdf");
    exit;
@endphp
