<?php 
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;
use App\Models\EstudianteModel;
use App\Models\ProfesorModel;
use App\Models\AcudienteModel;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ReportesController extends Controller 
{
    protected $usuarioModel;
    protected $estudianteModel;
    protected $acudienteModel;
    protected $profesorModel;

    public function __construct()
    {
        $this->usuarioModel    = new UsuarioModel();
        $this->estudianteModel = new EstudianteModel();
        $this->acudienteModel  = new AcudienteModel();
        $this->profesorModel = new ProfesorModel();
    }

    // Vista principal donde mostrarás los botones de descargar
    public function index()
    {
        // echo view('admin/layout');
        echo view('admin/secciones/reportes');
    }

    // Exportar estudiantes
    public function exportarEstudiantes()
    {
        $colegio_id = session()->get('colegio_id');

        // Obtenemos los datos
        $estudiantes = $this->estudianteModel->obtenerEstudiantes($colegio_id);

        // Crear hoja de Excel
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Estudiantes');

        // Encabezados del Excel
        $encabezados = [
            'Rol', 'Primer Nombre', 'Segundo Nombre',
            'Primer Apellido', 'Segundo Apellido', 'Tipo Doc', 'Documento',
            'Username', 'Correo', 'Teléfono', 'Dirección', 'Nacimiento',
            'Fecha Ingreso', 'Estado'
        ];

        $columnas = [
            'rol', 'primer_nombre', 'segundo_nombre', 'primer_apellido', 'segundo_apellido',
            'tipo_documento', 'documento', 'username', 'correo', 'telefono', 'direccion', 'fecha_nacimiento', 'fecha_ingreso', 'estado'
        ];

       $col = 1;
        foreach ($encabezados as $titulo) {
        $cell = Coordinate::stringFromColumnIndex($col) . '1';
        $sheet->setCellValue($cell, $titulo);
        $col++;
        }

         // Llenar los datos SIN CORRERSE
        $fila = 2;
        foreach ($estudiantes as $estu) {
        $col = 1;
        foreach ($columnas as $campo) {
            $cell = Coordinate::stringFromColumnIndex($col) . $fila;
            $sheet->setCellValue($cell, $estu[$campo]);
            $col++;
        }
        $fila++;
        }

        // Descargar archivo
        $writer = new Xlsx($spreadsheet);

        $filename = "Reporte_Estudiantes_" . date('Y-m-d_H-i-s') . ".xlsx";

        // Headers
        return $this->response
            ->setHeader('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
            ->setHeader('Content-Disposition', "attachment; filename={$filename}")
            ->setHeader('Cache-Control', 'max-age=0')
            ->setBody($writer->save('php://output'));
    }

    // Exportar acudientes
    public function exportarAcudientes()
    {
        $colegio_id = session()->get('colegio_id');

        $acudientes = $this->acudienteModel->obtenerAcudientes($colegio_id);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Acudientes');

        $encabezados = [
            'ID', 'Colegio', 'Rol', 'Primer Nombre', 'Segundo Nombre',
            'Primer Apellido', 'Segundo Apellido', 'Tipo Doc', 'Documento',
            'Username', 'Correo', 'Teléfono', 'Dirección', 'Nacimiento',
            'Parentesco'
        ];

        $col = 1;
        foreach ($encabezados as $titulo) {
            $cell = Coordinate::stringFromColumnIndex($col) . '1';
            $sheet->setCellValue($cell, $titulo);
            $col++;
        }

        // Datos
        $fila = 2;
        foreach ($acudientes as $acu) {
            $col = 1;
            foreach ($acu as $valor) {
                $cell = Coordinate::stringFromColumnIndex($col) . $fila;
                $sheet->setCellValue($cell, $valor);
                $col++;
            }
            $fila++;
        }

        $writer = new Xlsx($spreadsheet);

        $filename = "Reporte_Acudientes_" . date('Y-m-d_H-i-s') . ".xlsx";

        return $this->response
            ->setHeader('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
            ->setHeader('Content-Disposition', "attachment; filename={$filename}")
            ->setHeader('Cache-Control', 'max-age=0')
            ->setBody($writer->save('php://output'));
    }

    public function exportarProfesores()
    {
        $colegio_id = session()->get('colegio_id');

        $profesores = $this->profesorModel->obtenerProfesores($colegio_id);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Profesores');

        $encabezados = [
            'ID', 'Colegio', 'Rol', 'Primer Nombre', 'Segundo Nombre',
            'Primer Apellido', 'Segundo Apellido', 'Tipo Doc', 'Documento',
            'Username', 'Correo', 'Teléfono', 'Dirección', 'Nacimiento',
            'Título Académico', 'Experiencia en años'
        ];

        $col = 1;
        foreach ($encabezados as $titulo) {
            $cell = Coordinate::stringFromColumnIndex($col) . '1';
            $sheet->setCellValue($cell, $titulo);
            $col++;
        }

        // Datos
        $fila = 2;
        foreach ($profesores as $prof) {
            $col = 1;
            foreach ($prof as $valor) {
                $cell = Coordinate::stringFromColumnIndex($col) . $fila;
                $sheet->setCellValue($cell, $valor);
                $col++;
            }
            $fila++;
        }

        $writer = new Xlsx($spreadsheet);

        $filename = "Reporte_Profesores_" . date('Y-m-d_H-i-s') . ".xlsx";

        return $this->response
            ->setHeader('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
            ->setHeader('Content-Disposition', "attachment; filename={$filename}")
            ->setHeader('Cache-Control', 'max-age=0')
            ->setBody($writer->save('php://output'));
    }

}

?>