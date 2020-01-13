@php
    Fpdf::AddPage('P','Letter');
    Fpdf::SetFont('Courier', 'B', 18);

    Fpdf::Image('./images/logo.png',20,10,20,20);

    Fpdf::ln(5);

    Fpdf::SetFont('Arial', 'B', 20);
    Fpdf::SetMargins(15, 50, 0);
    Fpdf::cell(0, 20, utf8_decode(""), 0, 1, 'C', false);
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
    foreach ($respuestas_user as $respuesta_user){
        Fpdf::ln(2);
    Fpdf::cell(5, 8, "", 0, 0, 'C', false);
    Fpdf::cell(35, 8, "Carnet Identidad", 0, 0, 'L', false);
    Fpdf::SetFillColor(225,221,124);
    Fpdf::cell(145, 8, $user->numero_carnet, 0, 1, 'C', true);
        Fpdf::cell(5, 8, "", 0, 0, 'C', false);
        Fpdf::cell(35, 8, "Carnet Identidad", 0, 0, 'L', false);
        Fpdf::SetFillColor(225,221,124);
        Fpdf::cell(145, 8, $user->numero_carnet, 0, 1, 'C', true);
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
