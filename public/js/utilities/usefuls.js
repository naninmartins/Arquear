/*
|--------------------------------------------------------------------------
| Usefuls
|--------------------------------------------------------------------------
| This is a JavaScript Class that aim to implement the major basics functions
| in a reusable mode for every day actions by the developer life
| questions or suggestions please send a email to: naninmartins@gmial.com
| all rigths by: Ernani Martins
*/

class Usefuls  {

    constructor () {
        this.initialize ();
    }

    initialize() {

    }

    /*
    |--------------------------------------------------------------------------
    | Validate CPF
    |--------------------------------------------------------------------------
    | This is a JavaScript function that return true if a CPF is valid,
    | the entry is purely a string the algorithm was updated to fit my
    | needed and your logic can be found on the links:
    | https://www.devmedia.com.br/validar-cpf-com-javascript/23916 last access on: 2018/03/13
    | https://medium.com/@osuissa/javascript-validacao-de-cpf-passo-a-passo-9428ee32c104 last access on: 2018/03/13
    */
    validateCPF(strCPF) {

        var Sum;
        var Mod;
        Sum = 0;

        if (strCPF.length == 14) {
            strCPF = strCPF.replace('.','');
            strCPF = strCPF.replace('.','');
            strCPF = strCPF.replace('-','');
        }

        if (this.equalCPF(strCPF)) {
        return false;
        }

        for (let i=1; i<=9; i++) {
        Sum += parseInt(strCPF.substring(i-1, i)) * (11 - i);
        }
        Mod = (Sum * 10) % 11;

        if ((Mod == 10) || (Mod == 11))  {
            Mod = 0;
        }
        if (Mod != parseInt(strCPF[9]) ) {
            return false;
        }

        Sum = 0;
        for (let i = 1; i <= 10; i++) {
            Sum += parseInt(strCPF.substring(i-1, i)) * (12 - i);
        }
        Mod = (Sum * 10) % 11;

        if ((Mod == 10) || (Mod == 11)){
            Mod = 0;
        }
        if (Mod != parseInt(strCPF[10] ) ) {
            return false;
        }
        return true;
    }

 // Verify if a cpf entry is like:777.777.777-77|111.111.111-11
    equalCPF (strCPF) {
        let equal = false;

        for (let i=0; i<=9; i++) {

            let index = i.toString();
            let str = index;

            for (let j=0; j<=9; j++) {
            str += index;
            }

            if (strCPF == str) {
                equal = true;
                break;
            }
        }
        return equal;
    }

    /*
    |--------------------------------------------------------------------------
    | Put and Remove Error AdminLte
    |--------------------------------------------------------------------------
    | Put and Remove error a input element in template AdminLte,
    | the element must have a span parent to use message
    */
    setError (element, text = '') {
        let div = element.parentElement;
        div.classList.add("has-error");
        let span = div.querySelector('div > span');
        span.innerHTML = text;
        span.style.color = "darkred";
    }

    removeError (element) {
        let div = element.parentElement;
        div.classList.remove("has-error");
        div.querySelector('div > span').innerHTML = '';
    }

    /*
    |--------------------------------------------------------------------------
    | Set a mask to a input of number phone
    |--------------------------------------------------------------------------
    | Needed use Jquery mask plugin
    */
    phoneMask (inputPhone) {
        $(inputPhone).blur(e=>{
            ($(e.target).val().length == 10) ? $(e.target).mask("(99)9999-9999") : $(e.target).mask("(99)99999-9999");
        });

        $(inputPhone).select( e=>{
            $(e.target).unmask();
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Set a generic mask to a input
    |--------------------------------------------------------------------------
    | Needed use Jquery mask plugin
    */
    setMask (mask,input) {
        $(input).blur(e=>{
            ($(e.target).val().length == 10) ? $(e.target).mask(mask) : $(e.target).mask(mask);
        });

        $(input).select( e=>{
            $(e.target).unmask();
        });
    }

     /*
    |--------------------------------------------------------------------------
    | Set value '' to some inputs
    |--------------------------------------------------------------------------
    | This function set a empty value for a set of inputs, It's needed put a
    | class/id selector in a div upper of inputs
    */
    clearInputs(inputs) {
        let el = document.querySelectorAll(`${inputs} input`); // look : https://stackoverflow.com/questions/11320631/what-s-the-difference-between-the-css-selectors-div-p-and-div-p
        el.forEach(element => {
            element.value = '';
        });
   }

    /*
    |--------------------------------------------------------------------------
    | Validate required fields
    |--------------------------------------------------------------------------
    | This functions set validate required fields in a form, just add class
    | 'usefulRequired'
    */

    // Set the class name '.form'
    validateForm (formName) {
        let form = document.querySelector(formName);
        form.addEventListener('submit', e=>{
            e.preventDefault();
            (this.validateInputs(formName)) ? form.submit() : false;
        });
    }

    //to use this function add the class name 'usefulRequired' in the desired fields    //
   validateInputs(inputs) {
        let el = document.querySelectorAll(`${inputs} .usefulRequired`); // look : https://stackoverflow.com/questions/11320631/what-s-the-difference-between-the-css-selectors-div-p-and-div-p
        let error = [];
            el.forEach(element => {
               error.push(this.validate(element));
            });
        return (error.indexOf(true) > -1 ? false : true);
   }

   //verify if a field.value is null
   validate(element) {
        let error = false;
        if(!element.value) {
            this.setError(element,'Please fill out this field!');
            error = true;
        }
        else {
            this.removeError(element);
        }
        return error;
    }

}

