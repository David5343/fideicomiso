<?php

namespace App\Livewire\Prestaciones\Familiares;

use App\Models\Humanos\Bank;
use App\Models\Prestaciones\Beneficiary;
use App\Models\Prestaciones\Insured;
use Exception;
use Livewire\Component;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;

class CreateFamily extends Component
{

    public $busqueda ="";
    public $hidden_id=0;
    public $nombre_afiliado="";
    public $rfc_afiliado="";
    public $no_expediente="";
    #[Validate('required | unique:beneficiaries,file_number')] 
    public $num_expediente="";
    #[Validate('required | max: 8 | unique:beneficiaries,file_number')]
    public $expediente_hidden="";
    #[Validate('required|date|max:10')]
    public $fecha_ingreso="";
    #[Validate('required | max:20')]  
    public $apaterno="";
    #[Validate('required | max:20')] 
    public $amaterno="";
    #[Validate('required | max:30')] 
    public $nombre="";
    #[Validate('required|date|max:10')] 
    public $fecha_nacimiento="";
    #[Validate('required')] 
    public $sexo="";
    #[Validate('nullable | max:13| alpha_num:ascii')] 
    public $rfc="";
    #[Validate('required|max:18|alpha_num:ascii|unique:beneficiaries,curp')]
    public $curp="";
    #[Validate('required')] 
    public $persona_discapacitada="";
    #[Validate('required')] 
    public $parentesco="";
    #[Validate('required | max:150')] 
    public $direccion ="";
    #[Validate('nullable | max:150')] 
    public $observaciones="";
    #[Validate('nullable | numeric | max_digits:10')] 
    public $num_cuenta="";
    #[Validate('nullable | numeric | max_digits:18')] 
    public $clabe="";
    #[Validate('nullable')] 
    public $banco_id;
    #[Validate('nullable | max:50')] 
    public $nombre_representante="";
    #[Validate('nullable | max:13 | alpha_num:ascii')] 
    public $rfc_representante="";
    #[Validate('nullable | max:18 | alpha_num:ascii')] 
    public $curp_representante="";
    #[Validate('nullable')] 
    public $parentesco_representante="";

    public function buscar()
    {
        $row = Insured::where('file_number',$this->busqueda)->first();
        if($row !== null)
        {
            $this->hidden_id = $row->id;
            $this->nombre_afiliado = $row->last_name_1.' '.$row->last_name_2.' '.$row->name;
            $this->rfc_afiliado = $row->rfc;
        }else{
            session()->flash('msg_tipo_busqueda','info');
            session()->flash('msg_busqueda','Ups!, No se encontro ningun registro.'); 
        }

    }
    public function guardar()
    {
        DB::beginTransaction();
        try
        {
            $this->validate();
            //El trabajador solo tiene derecho a registrar una esposa, una concubina
            //una Madre y un Padre
            //El trabajador puede registrar N cantidad de hijos
            $esposa = Beneficiary::where('status','active')
                                    ->where('insured_id',$this->hidden_id)
                                    ->where('relationship','Esposa')->get();
            $concubina = Beneficiary::where('status','active')
                                    ->where('insured_id',$this->hidden_id)
                                    ->where('relationship','Concubina')->get();
            $mama = Beneficiary::where('status','active')
                                    ->where('insured_id',$this->hidden_id)
                                    ->where('relationship','Madre')->get();
            $papa = Beneficiary::where('status','active')
                                    ->where('insured_id',$this->hidden_id)
                                    ->where('relationship','Padre')->get();
            $hijos = Beneficiary::where('status','active')
                                    ->where('relationship','Hijo/a')
                                    ->where('curp',$this->curp)->get();

                $familiar = new Beneficiary();
                $familiar->file_number = $this->expediente_hidden;
                $familiar->start_date = $this->fecha_ingreso;  
                $familiar->last_name_1 = $this->apaterno;
                $familiar->last_name_2 = $this->amaterno;
                $familiar->name = $this->nombre;
                $familiar->birthday = $this->fecha_nacimiento;
                $familiar->sex = $this->sexo;
                $familiar->rfc = $this->rfc;
                $familiar->curp = $this->curp;
                $familiar->disabled_person = $this->persona_discapacitada;
                $familiar->relationship = $this->parentesco;
                $familiar->address = $this->direccion;
                $familiar->observations = $this->observaciones;
                $familiar->account_number = $this->num_cuenta;
                $familiar->clabe = $this->clabe;
                $familiar->bank_id = $this->banco_id;
                $familiar->representative_name = $this->nombre_representante;
                $familiar->representative_rfc = $this->rfc_representante;
                $familiar->representative_curp = $this->curp_representante;
                $familiar->representative_relationship = $this->parentesco_representante;
                $familiar->insured_id = $this->hidden_id;
                $familiar->affiliate_status = 'active'; 
                $familiar->status = 'active';
                $familiar->modified_by = Auth::user()->email;
                switch ($this->parentesco) {
                    case 'Padre':
                        if($papa->count()==0){
                            sleep(1);
                            $familiar->save();
                            session()->flash('msg_tipo', 'success');
                            session()->flash('msg', 'Registro con No. de Expediente: '.$familiar->file_number.' creado con éxito!');
                            $this->js("alert('Registro con No. de Expediente:".$familiar->file_number." creado con éxito!')"); 
                        }else{
                            session()->flash('msg_tipo','warning');
                            session()->flash('msg', 'Ya existe un registro con el parentesco:Padre para este Trabajador');
                            $this->js("alert('Ya existe un registro con el parentesco:Padre para este Trabajador')");                             
                        }
                        break;
                    case 'Madre':
                        if($mama->count()==0){
                            sleep(1);
                            $familiar->save();
                            session()->flash('msg_tipo', 'success');
                            session()->flash('msg', 'Registro con No. de Expediente: '.$familiar->file_number.' creado con éxito!');
                            $this->js("alert('Registro con No. de Expediente:".$familiar->file_number." creado con éxito!')"); 
                        }else{
                            session()->flash('msg_tipo','warning');
                            session()->flash('msg', 'Ya existe un registro con el parentesco:Madre para este Trabajador');
                            $this->js("alert('Ya existe un registro con el parentesco:Madre para este Trabajador')");                             
                        }
                        break;
                    case 'Esposa':
                        if($esposa->count()==0 && $concubina->count()==0){
                            sleep(1);
                            $familiar->save();
                            session()->flash('msg_tipo', 'success');
                            session()->flash('msg', 'Registro con No. de Expediente: '.$familiar->file_number.' creado con éxito!');
                            $this->js("alert('Registro con No. de Expediente:".$familiar->file_number." creado con éxito!')"); 
                        }else{
                            session()->flash('msg_tipo','warning');
                            session()->flash('msg', 'Ya existe un registro con el parentesco:Esposa o Concubina para este Trabajador');
                            $this->js("alert('Ya existe un registro con el parentesco:Esposa o Concubina para este Trabajador')");                             
                        }
                        break;
                    case 'Concubina':
                        if($concubina->count()==0 && $esposa->count()==0){
                            sleep(1);
                            $familiar->save();
                            session()->flash('msg_tipo', 'success');
                            session()->flash('msg', 'Registro con No. de Expediente: '.$familiar->file_number.' creado con éxito!');
                            $this->js("alert('Registro con No. de Expediente:".$familiar->file_number." creado con éxito!')"); 
                        }else{
                            session()->flash('msg_tipo','warning');
                            session()->flash('msg', 'Ya existe un registro con el parentesco:Concubina o Esposa para este Trabajador');
                            $this->js("alert('Ya existe un registro con el parentesco:Concubina o Esposa para este Trabajador')");                             
                        }
                        break;
                         case 'Hijo/a':
                            sleep(1);
                            $familiar->save();
                            session()->flash('msg_tipo', 'success');
                            session()->flash('msg', 'Registro con No. de Expediente: '.$familiar->file_number.' creado con éxito!');
                            $this->js("alert('Registro con No. de Expediente:".$familiar->file_number." creado con éxito!')"); 
                        //     if($hijos->count()==0){
                        //         sleep(1);
                        //         $familiar->save();
                        //         session()->flash('msg_tipo', 'success');
                        //         session()->flash('msg', 'Registro con No. de Expediente: '.$familiar->file_number.' creado con éxito!');
                        //         $this->js("alert('Registro con No. de Expediente:".$familiar->file_number." creado con éxito!')"); 
                        //     }else{
                        //         if($hijos->count()==1){
                        //             foreach($hijos as $hijo){
                        //                 if($hijo->secondary_insured_id == null){
                        //                     if($hijo->file_number === $this->hidden_id){
                        //                         session()->flash('msg_tipo','warning');
                        //                         session()->flash('msg', 'Ya existe registro con CURP:'.$hijo->curp.'vinculado con '.
                        //                         'No. de Expediente: '.$hijo->insured->file_number);
                        //                         //$this->js("alert('Ya existe registro con CURP:'.$hijo->curp.'vinculado con No. de Expediente: '.$hijo->insured)"); 
                        //                     }
                        //                     $row = Beneficiary::find($hijo->id);
                        //                     $row->secondary_insured_id = $this->hidden_id;
                        //                     $row->modified_by = Auth::user()->email;
                        //                     sleep(1);
                        //                     $row->save();
                        //                     session()->flash('msg_tipo', 'success');
                        //                     session()->flash('msg', 'Registro con CURP: '.$hijos->curp.' ya existe vinculado con '.
                        //                     'No. de Expediente: '.$hijos->insured->file_number.'. Se vinculo con éxito! al No. de Expediente secundario: '.$this->hidden_id);
                        //                     $this->js("alert('Registro con CURP: '.$hijos->curp.' ya existe vinculado con '.
                        //                     'No. de Expediente: '.$hijos->insured->file_number.'. Se vinculo con éxito! al No. de Expediente secundario: '.$this->hidden_id)"); 
                        //                 }else{
                        //                     session()->flash('msg_tipo','warning');
                        //                     session()->flash('msg', 'Ya existe registro con CURP:'.$hijos->curp.'vinculado con '.
                        //                     'No. de Expediente: '.$hijos->insured->file_number.' y No. de Expediente secundario: '.$hijos->secondary_insured_id);
                        //                     $this->js("alert('Ya existe registro con CURP:'.$hijos->curp.'vinculado con '.
                        //                     'No. de Expediente: '.$hijos->insured->file_number.' y No. de Expediente secundario: '.$hijos->secondary_insured_id)"); 
                        //                 }
                        //             } 
                        //         }                     
                        // }
                             break;                    
                            default:
                            break;
                } 
        
        }catch (Exception $e){
            DB::rollBack();
            session()->flash('msg_tipo', 'danger');
            session()->flash('msg', $e->getMessage()); 
        }
        DB::commit();

    }

    public function render()
    {
        
        $select4 = Bank::where('status', 'active')->get();
        $this->num_expediente = IdGenerator::generate(['table' => 'beneficiaries','field' => 'file_number', 'length' => 8, 'prefix' =>'F']);
        $this->expediente_hidden = $this->num_expediente;
        return view('livewire.prestaciones.familiares.create-family',['select4'=>$select4,
                                                                        'num_expediente'=>$this->num_expediente]);
    }
}
