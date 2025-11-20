document.addEventListener("DOMContentLoaded", function() {

    const selectComp = document.getElementById("compensacion");
    const contenedorCantidad = document.getElementById("cantidadContainer");

    selectComp.addEventListener("change", function () {
        if (this.value === "si") {
            contenedorCantidad.classList.remove("cantidad");
        } else {
            contenedorCantidad.classList.add("cantidad");
        }
    });

});

