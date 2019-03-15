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

    cpfCnpjMask (inputCpfCnpj) {
        inputCpfCnpj.blur( e=>{
            let tam = $(e.target).val().length;
            let type = $(e.target).val()[3]
            //if tam 11 or 14 but in your 3 position haven't a "." is a CPF number
            if (tam == 11 || tam == 14 && type =='.' ) {
                //If CPF isn't valid set a Error on input
                (!this._useful.validateCPF($(e.target).val())) ? this._useful.setError($(e.target)[0],'CPF inválido!') : this._useful.removeError($(e.target)[0]);
                $(e.target).mask("999.999.999-99");
            }
            //if tam 14 or 18 but in your 3 position have a "." is a CNPJ number
            if ( tam == 14 && type !='.' || tam == 18 ) {
                $(e.target).mask("99.999.999/9999-99");
            }
        });
        //reset mask each time that is selected
        inputCpfCnpj.select( e=>{
            $(e.target).unmask();
        });
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
        div.querySelector('div > span').innerHTML = text;
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

   validateInputs(inputs) {
        let el = document.querySelectorAll(`${inputs} .usefulRequired`); // look : https://stackoverflow.com/questions/11320631/what-s-the-difference-between-the-css-selectors-div-p-and-div-p
        let error = [];
            el.forEach(element => {
                //here we have 4 main types to input: select, text, number an checkbox, and we need to treat selected and
               error.push(this.validate(element));
            });
        return (error.indexOf(true) > -1 ? false : true);
   }

   validate(element) {
        let error = false;
        if(!element.value) {
            this.setError(element,'Campo obrigatório!');
            error = true;
        }
        else {
            this.removeError(element);
        }
        return error;
    }

}

