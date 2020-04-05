<?php
class TenantController extends Controller
{
    protected $model;

    public function __construct() {
        $this->model = $this->model("Tenant");
    }

    public function index() {
        $tenants = $this->model->getAllTenants();
        $this->view('tenant/index', [
           "tenants" => $tenants
        ]);
    }

    public function insert() {
        $pname = $_POST["pname"];
        $phonenum = $_POST["phonenum"];
        $tenants = $this->model->insertTenant(NULL, $pname, $phonenum);
        $this->view('tenant/index', [
            "tenants" => $tenants
         ]);
    }

    public function update() {
        $tenants = $this->model->updateTenant();
        $this->view('tenant/index', [
            "tenants" => $tenants
         ]);
    }
}