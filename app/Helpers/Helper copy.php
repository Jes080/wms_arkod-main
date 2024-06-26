<?php
namespace App\Helpers;

class Helper{
    public static function CodeGenerator ($model, $trow, $length = 4, $prefix){
        $data = $model::orderBy('id','desc')->first();
        if (!$data){
            $og_length = $length;
            $last_number = '';
        }else{
            $code = substr($data->$trow, strlen($prefix)+1);
            $actual_last_number = intval($code) / 1 * 1;
            $increment_last_number = $actual_last_number+1;
            $last_number_length = strlen($increment_last_number);
            $og_length = $length - $last_number_length;
            $last_number = $increment_last_number;
        }
        $zeros = "";
        for ($i=0; $i<$og_length;$i++){
            $zeros.="";
        }
        return $prefix.$zeros.$last_number;
    }
    public function productCodeExists($number){
        return product::whereProductCode($number)->exists();
    }
}
?>
<!-- // public function store(Request $request)
    // {
    //     $request->validate([
    //         'date' => 'required|date|after_or_equal:today',
    //         // Other validation rules for your form fields
    //     ]);

    //     $number = mt_rand(1000000000,9999999999);

    //     if ($this->productCodeExists($number)){
    //         $number = mt_rand(1000000000,9999999999);
    //     }
    //     $request['product_code'] = $number;
    //     Product::create($request->all());
    //     return redirect ('/');
    //     // Process the form data
    // }

     -->
