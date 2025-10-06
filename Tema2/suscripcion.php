<?php 

    function calcularSuscripcion(string $plan, bool $estudiante,
     bool $anual) :string{
        $precio = 0;
        $desc = "";
        $plan = trim($plan);

        if ($plan !== "basic" && $plan !== "enterprise" 
         && $plan !== "pro" || $plan === ""){
            return "Plan no disponible";
        }
        else{
            match (true){
               $plan === "basic" =>  $precio = 25,
               $plan === "pro" => $precio = 40,
               $plan === "enterprise" => $precio = 60,
               default => $precio = -1
            };

            if ($estudiante){
                $precio *= 0.85;
                $desc .= "E";
            }
            if ($anual){
                $precio *= 0.80;
                $estudiante ? $desc.= " DESC: A": $desc.="A";
            }

            return "Plan: $plan - Total: $precio - DESC: $desc";
        }
    }
    $res = "";
    switch (rand(1,3)){
        case 1:
            $res .= "basic";
            break;
        case 2:
            $res .= "pro";
            break;
        default:
            $res .= "pro";
    }
    echo calcularSuscripcion($res, rand(0,1), rand(0,1));

?>