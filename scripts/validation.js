const inputs = Array.from(document.querySelectorAll('input'));
inputs.push(document.querySelector('textarea'));

const regExp = {
    name: /^([a-zA-z]+)\s?([a-zA-z]+)?\s?([a-zA-z]+)?$/,
    mail: /^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/,
    item: /^[A-z\s,]+$/,
    phone: /^\d{10}$/,
    mode: /^[A-z\s]+$/,
    address: /^[\w\s\,\./\\\-]{5,300}$/
};

const validate = (field,regex) => {
    console.log(field.value);
    console.log(regex.test(field.value))
    if(regex.test(field.value)){
        field.className = 'valid';
    }
    else{
        field.className = 'invalid';
    }
}

inputs.forEach(input => {
    input.addEventListener('keyup',e => {
        validate(e.target,regExp[e.target.attributes.name.value]);
    });
});