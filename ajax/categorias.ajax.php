<?php

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";


class AjaxCategorias {
    private $idCategoria;

    public function __construct(array $data = []) {
        if (!empty($data)) {
            $this->setProperties($data);
        }
    }
    
	private function setProperties(array $data): void {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
    
    public function setIdCategoria($idCategoria): void {
        $this->idCategoria = (int)$idCategoria;
    }
    
    public function ajaxEditarCategoria(): void {
        // Validate ID
        if (empty($this->idCategoria) || !is_numeric($this->idCategoria)) {
            $this->sendResponse(['error' => 'ID de categoría inválido'], 400);
            return;
        }
        
        $item = "id";
        $valor = $this->idCategoria;
        
        try {
            $respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);
            
            if ($respuesta) {
                $this->sendResponse($respuesta);
            } else {
                $this->sendResponse(['error' => 'Categoría no encontrada'], 404);
            }
        } catch (Exception $e) {
            $this->sendResponse(['error' => 'Error al procesar la solicitud: ' . $e->getMessage()], 500);
        }
    }
    
    private function sendResponse($data, int $statusCode = 200): void {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}

// Process AJAX requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle category edit request
    if (isset($_POST["idCategoria"])) {
        $categoria = new AjaxCategorias();
        $categoria->setIdCategoria($_POST["idCategoria"]);
        $categoria->ajaxEditarCategoria();
    }
    // You can add more AJAX operations here
} else {
    // Respond with error if not a POST request
    http_response_code(405);
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Método no permitido']);
    exit;
}