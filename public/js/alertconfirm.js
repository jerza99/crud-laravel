function confirmDelet(id) {
    alertify.confirm("This is a prompt dialog.",
    function (e) {
        if (e) {
            let form = document.createElement('form')
            form.method = 'post'
            form.action = `/students/${id}`
            form.innerHTML = '@csrf @method("DELETE")'
            document.body.appendChild(form)
            form.submit()
        } else {
            return false;
        }
    }
    );
}
