@php
    Fpdf::AddPage('P','Letter');
    Fpdf::SetFont('Courier', 'B', 18);

    Fpdf::Image('./images/logo.png',20,10,20,20);

    Fpdf::ln(5);

    Fpdf::SetFont('Arial', 'B', 16);
    Fpdf::SetMargins(15, 50, 0);
    Fpdf::cell(0, 20, utf8_decode("REGISTRO DE POSTULACIÓN"), 0, 1, 'C', false);
    // datos del cliente
    $dias=["Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"];
    $meses=["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];

    Fpdf::SetFont('Arial', '', 10);

    Fpdf::SetFont('Arial', '', 16);
    Fpdf::cell(5, 8, "", 0, 0, 'C', false);
    Fpdf::cell(100, 8, "Datos Personales", 0, 0, 'L', false);

    Fpdf::SetFont('Arial', '', 10);
    Fpdf::cell(80, 8, "Oruro, ".$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]." del ".date('Y'), 0, 1, 'R', false);

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
    Fpdf::cell(35, 8, "Carnet Identidad: ", 0, 0, 'L', false);
    Fpdf::SetFillColor(225,221,124);
    Fpdf::cell(40, 8, $user->numero_carnet, 0, 0, 'C', true);
    Fpdf::cell(65, 8, "Fecha de Nacimiento: ", 0, 0, 'C', false);
    Fpdf::SetFillColor(225,221,124);
    $fecha = explode('-', $user->fecha_nacimiento)[2] . '/' . explode('-', $user->fecha_nacimiento)[1] . '/'. explode('-', $user->fecha_nacimiento)[0];
    Fpdf::cell(40, 8, $fecha, 0, 1, 'C', true);

    Fpdf::ln(2);
    Fpdf::cell(5, 8, "", 0, 0, 'C', false);
    Fpdf::cell(35, 8, "Estado Civil: ", 0, 0, 'L', false);
    Fpdf::SetFillColor(225,221,124);
    Fpdf::cell(40, 8, utf8_decode(strtoupper($user->estado_civil)), 0, 0, 'C', true);
    Fpdf::cell(65, 8, "Sexo: ", 0, 0, 'C', false);
    Fpdf::SetFillColor(225,221,124);
    Fpdf::cell(40, 8, strtoupper($user->sexo), 0, 1, 'C', true);

    Fpdf::ln(2);
    Fpdf::cell(5, 8, "", 0, 0, 'C', false);
    Fpdf::cell(35, 8, "Lugar: ", 0, 0, 'L', false);
    Fpdf::SetFillColor(225,221,124);
    Fpdf::cell(40, 8, utf8_decode(strtoupper($user->lugar)), 0, 0, 'C', true);
    Fpdf::cell(65, 8, "Nacionalidad: ", 0, 0, 'C', false);
    Fpdf::SetFillColor(225,221,124);
    Fpdf::cell(40, 8, strtoupper($user->nacionalidad), 0, 1, 'C', true);

    Fpdf::ln(2);
    Fpdf::cell(5, 8, "", 0, 0, 'C', false);
    Fpdf::cell(35, 8, utf8_decode("Dirección: "), 0, 0, 'L', false);
    Fpdf::SetFillColor(225,221,124);
    Fpdf::cell(145, 8, utf8_decode(strtoupper($user->direccion)), 0, 1, 'C', true);

    Fpdf::ln(2);
    Fpdf::cell(5, 8, "", 0, 0, 'C', false);
    Fpdf::cell(35, 8, "Celular: ", 0, 0, 'L', false);
    Fpdf::SetFillColor(225,221,124);
    Fpdf::cell(40, 8, $user->telefono_celular, 0, 0, 'C', true);
    Fpdf::cell(40, 8, utf8_decode("Correo Electrónico: "), 0, 0, 'C', false);
    Fpdf::SetFillColor(225,221,124);
    Fpdf::SetFont('Arial', '', 8);
    Fpdf::cell(65, 8, $user->email, 0, 1, 'C', true);
    Fpdf::SetFont('Arial', '', 10);

    Fpdf::ln(2);
    Fpdf::cell(5, 8, "", 0, 0, 'C', false);
    Fpdf::cell(35, 8, utf8_decode("Teléfono: "), 0, 0, 'L', false);
    Fpdf::SetFillColor(225,221,124);
    Fpdf::cell(40, 8, $user->telefono, 0, 0, 'C', true);
    Fpdf::cell(40, 8, "Fax: ", 0, 0, 'C', false);
    Fpdf::SetFillColor(225,221,124);
    Fpdf::cell(65, 8, $user->fax, 0, 1, 'C', true);

    Fpdf::ln(2);
    Fpdf::cell(5, 8, "", 0, 0, 'C', false);
    Fpdf::cell(35, 8, "Casilla Postal: ", 0, 0, 'L', false);
    Fpdf::SetFillColor(225,221,124);
    Fpdf::cell(40, 8, $user->casilla_postal, 0, 0, 'C', true);
    Fpdf::cell(40, 8, "No. Libreta S. Militar: ", 0, 0, 'C', false);
    Fpdf::SetFillColor(225,221,124);
    Fpdf::cell(65, 8, utf8_decode(strtoupper($user->numero_libreta_militar)), 0, 1, 'C', true);

    Fpdf::ln(3);
    Fpdf::SetFont('Arial', '', 16);
    Fpdf::cell(5, 8, "", 0, 0, 'C', false);
    Fpdf::cell(100, 8, utf8_decode("Información Académica"), 0, 1, 'L', false);

    Fpdf::SetFont('Arial', '', 10);

    Fpdf::ln(2);
    Fpdf::cell(5, 8, "", 0, 0, 'C', false);
    Fpdf::cell(35, 8, utf8_decode("Gestión Academica: "), 0, 0, 'L', false);
    Fpdf::SetFillColor(225,221,124);
    Fpdf::cell(40, 8, $user->academico_gestion, 0, 0, 'C', true);
    Fpdf::cell(40, 8, utf8_decode("Título Academico: "), 0, 0, 'C', false);
    Fpdf::SetFillColor(225,221,124);
    Fpdf::SetFont('Arial', '', 6);
    Fpdf::cell(65, 8, utf8_decode($user->academico_titulo), 0, 1, 'C', true);
    Fpdf::SetFont('Arial', '', 10);

    Fpdf::ln(2);
    Fpdf::cell(5, 8, "", 0, 0, 'C', false);
    Fpdf::cell(35, 8, "Grado Academico: ", 0, 0, 'L', false);
    Fpdf::SetFillColor(225,221,124);
    Fpdf::cell(40, 8, utf8_decode(strtoupper($user->academico_grado)), 0, 0, 'C', true);
    Fpdf::cell(40, 8, "Inst. Academica: ", 0, 0, 'C', false);
    Fpdf::SetFillColor(225,221,124);
    Fpdf::SetFont('Arial', '', 6);
    Fpdf::cell(65, 8, utf8_decode(strtoupper($user->academico_institucion)), 0, 1, 'C', true);

    Fpdf::SetFont('Arial', 'I', 12);

    Fpdf::ln(7);
    Fpdf::SetTextColor(231,168,17);

    Fpdf::cell(190, 10, "Mi persona cuenta con disponibilidad total de tiempo para viajes al interior del departamento.", 0, 1, 'C', false);


    Fpdf::SetFont('Arial', '', 8);
    Fpdf::SetTextColor(0,0,0);
    Fpdf::cell(190, 8, utf8_decode("Presentar este documento en oficinas de Recursos Humanos de SERECÍ - ORURO"), 0, 1, 'C', false);

    Fpdf::SetMargins(15, 50, 0);
    Fpdf::SetLineWidth(0.1);
    //Fpdf::Line(90,230,140,230);

    Fpdf::ln(50);
    Fpdf::cell(0, 4, utf8_decode($user->nombres.' '.$user->apellido_paterno.' '.$user->apellido_materno), 0, 1, 'C', false);
    Fpdf::cell(0, 4, "POSTULANTE", 0, 1, 'C', false);
    Fpdf::SetTitle("Solicitud".date("Ymd H:i:s"));
    Fpdf::Output("I","Solicitud".date("Ymd H:i:s").".pdf");
    exit;
@endphp
