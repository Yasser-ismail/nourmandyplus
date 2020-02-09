<?php


namespace App\Http\Controllers\BackEnd;


use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class BackEndController extends Controller
{
    protected $model;


    public function __construct(Model $model)
    {
        $this->model = $model;

    }


    protected function filter($rows)
    {
        return $rows;
    }

    protected function getModuleNameFromModel()
    {
        return strtolower($this->getPluralModelName());
    }

    protected function getPluralModelName()
    {
        return str_plural(class_basename($this->model));
    }


    protected function getSingularModelName()
    {
        return class_basename($this->model);
    }

    protected function append() {
        return [];
    }

    public function index()
    {

        $module_name = $this->getPluralModelName();
        $smodule_name = $this->getSingularModelName();
        $page_title = ' Control ' . $module_name;
        $page_des = 'Here you can add / edit / delete ' . $module_name;
        $routeName = $this->getModuleNameFromModel();
        $rows = $this->model;
        $rows = $this->filter($rows);
        $rows = $rows->paginate(10);

        return view('backend.' . $this->getModuleNameFromModel() . '.index', compact('rows', 'module_name', 'page_title',
            'page_des', 'smodule_name', 'routeName'));
    }

    public function create()
    {

        $module_name = $this->getSingularModelName();
        $page_title = 'Create ' . $module_name;
        $page_des = 'Here you can add ' . $module_name;
        $routeName = $this->getModuleNameFromModel();
        $append = $this->append();

        return view('backend.' . $this->getModuleNameFromModel() . '.create', compact(
            'module_name',
            'page_title',
            'page_des',
            'routeName'))->with($append);
    }

    public function edit($id)
    {

        $module_name = $this->getSingularModelName();
        $page_title = ' Edit ' . $module_name;
        $page_des = 'Here you can Edit ' . $module_name;
        $routeName = $this->getModuleNameFromModel();
        $append = $this->append();

        $row = $this->model->findOrFail($id);

        return view('backend.' . $this->getModuleNameFromModel() . '.edit', compact('row',
            'module_name',
            'page_title',
            'page_des',
            'routeName'))->with($append);

    }


    public function destroy($id)
    {

        $row = $this->model->findOrFail($id);

        $row->delete();

        return redirect()->back();

    }

}
