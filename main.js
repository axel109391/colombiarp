fetch("data.json")
  .then((response) => response.json())
  .then((data) => {
    const autosList = document.getElementById("autos-list");

    // Mostrar todos los autos al cargar la página
    mostrarAutos(data);

    // Obtener referencias a los elementos de filtro
    const modeloInput = document.getElementById("filtro-modelo");
    const precioInput = document.getElementById("filtro-precio");
    const filtroBtn = document.getElementById("filtro-btn");

    // Agregar evento click al botón de filtro
    filtroBtn.addEventListener("click", () => {
      // Obtener valores seleccionados por el usuario
      const modeloFiltro = modeloInput.value;
      const precioFiltro = precioInput.value;

      // Filtrar los autos según los criterios seleccionados
      const autosFiltrados = data.filter((auto) => {
        return (
          (modeloFiltro === "" || auto.marca === modeloFiltro) &&
          (precioFiltro === "" || auto.precio <= precioFiltro)
        );
      });

      // Mostrar los autos filtrados
      mostrarAutos(autosFiltrados);
    });

    function mostrarAutos(autos) {
      autosList.innerHTML = "";

      autos.forEach((auto) => {
        const autoElement = document.createElement("div");
        autoElement.className = "auto";

        const nombreElement = document.createElement("h3");
        const nombreLink = document.createElement("a");
        nombreLink.href = auto.url;
        nombreLink.textContent = auto.nombre;
        nombreElement.appendChild(nombreLink);
        autoElement.appendChild(nombreElement);

        const tipoElement = document.createElement("p");
        tipoElement.textContent = "Tipo: " + auto["tipo de vehiculo"];
        autoElement.appendChild(tipoElement);

        const marcaElement = document.createElement("p");
        marcaElement.textContent = "Marca: " + auto.marca;
        autoElement.appendChild(marcaElement);

        const precioElement = document.createElement("p");
        precioElement.textContent = "Precio: $" + auto.precio;
        autoElement.appendChild(precioElement);

        const imagenElement = document.createElement("img");
        imagenElement.src = auto.imagen;
        imagenElement.alt = auto.nombre;
        autoElement.appendChild(imagenElement);

        autosList.appendChild(autoElement);
      });
    }
  })
  .catch((error) => {
    console.log("Error al obtener los datos: ", error);
  });
