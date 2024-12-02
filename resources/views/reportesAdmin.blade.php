@extends('layouts.plantilla')

@section('content')

<link href="{{ asset('/css/adminDestinos.css') }}" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/exceljs/dist/exceljs.min.js"></script>


<div class="grid grid-cols-3 gap-4 gap-4 h-auto min-h-full ">

    {{-- container tabla --}}
    <div class="container pt-10  col-start-1 col-end-4">

        <div class="mb-5 flex items-center align-middle">
            <i class="fa-solid fa-file fa-2xl"></i>
            <span class="text-[40px] ms-4">Generar Reportes</span>
        </div>

        <div class="relative  overflow-x-auto shadow-md sm:rounded-lg border-t-4 border-t-orange-500">
            <div class="mb-5 mt-3 flex items-center align-middle text-center gap-5  justify-self-center">
                <h5 class="mb-1 w-60 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white"></i>Formato Ecxel</h5>
            </div>
            
            <div id="date-range-picker2" date-rangepicker class=" ms-4 grid grid-cols-4 gap-4 mb-8" datepicker-format="dd-mm-yyyy">
                <div>  
                    <div class= " mt-5 mb-5 text-white  self-end bg-blue-600 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <button id="exportButton">
                            Generar Reporte Vuelos
                        </button>
                    </div>
                </div>

                <div>  
                    <!-- Contenedor Boton -->
                    <div class= " mt-5 mb-5 text-white  self-end bg-blue-600 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <button id="exportButtonD">
                            Generar Reporte Hoteles
                        </button>
                    </div>
                </div>

                <div>  
                    <!-- Contenedor Boton -->
                     <div class= " mt-5 mb-5 text-white  self-end bg-blue-600 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <button id="exportButtonCV">
                            Generar Reporte Clientes Vuelos
                        </button>
                    </div>
                </div>

                <div>  
                    <!-- Contenedor Boton -->
                     <div class= " mt-5 mb-5 text-white  self-end bg-blue-600 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <button id="exportButtonCH">
                            Generar Reporte Clientes Hoteles
                        </button>
                    </div>
                </div>
                
                
                
            </div>
            
        </div>
            
        

    </div>

   
    
    <!-- Aerolioneas -->
    <script>
        // Función para exportar datos a Excel
        function exportToExcelA(data, filenameA = 'Vuelos.xlsx') {
            // Crear un nuevo libro de trabajo
            const workbook = new ExcelJS.Workbook();
            const worksheet = workbook.addWorksheet("Vuelos");

            // Definir estilo para las celdas (puedes ajustar los colores y alineación)
            const headerStyle = {
                font: { bold: true, color: { argb: "FFFFFF" }, size: 12 },
                fill: { type: 'pattern', pattern: 'solid', fgColor: { argb: "FF8A4C" } },
                alignment: { horizontal: 'center', vertical: 'middle' },
                border: {
                    top: { style: 'thin', color: { argb: '000000' } },  
                    left: { style: 'thin', color: { argb: '000000' } }, 
                    bottom: { style: 'thin', color: { argb: '000000' } }, 
                    right: { style: 'thin', color: { argb: '000000' } }, 
                },
            };

            const cellStyle = {
                alignment: { horizontal: 'left', vertical: 'middle' },
                border: {
                    top: { style: 'thin', color: { argb: '000000' } },  
                    left: { style: 'thin', color: { argb: '000000' } }, 
                    bottom: { style: 'thin', color: { argb: '000000' } }, 
                    right: { style: 'thin', color: { argb: '000000' } }, 
                },
            };

            // Agregar encabezados (titulos de columna) a la hoja
            const columns = Object.keys(data[0]).map(key => ({ header: key, key: key }));
            worksheet.columns = columns;

            // Aplicar estilos a las celdas de encabezado
            worksheet.getRow(1).eachCell((cell) => {
                cell.style = headerStyle;
            });

            // Agregar los datos a la hoja
            data.forEach((item) => {
                worksheet.addRow(item);
            });

            // Aplicar estilo a las celdas de datos
            worksheet.eachRow((row, rowIndex) => {
                if (rowIndex > 1) { // No aplicar estilo al encabezado
                    row.eachCell((cell) => {
                        cell.style = cellStyle;
                    });
                }
            });

            // Establecer tamaño automático de las columnas
            worksheet.columns.forEach(column => {
                const maxLength = column.values.reduce((max, value) => Math.max(max, String(value).length), 0);
                column.width = maxLength + 2; // Añadir espacio extra
            });

            // Descargar el archivo Excel
            workbook.xlsx.writeBuffer().then((buffer) => {
                const blob = new Blob([buffer], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = filenameA;
                link.click();
            });
        }

        // Evento al hacer clic en el botón
        document.getElementById('exportButton').addEventListener('click', async () => {
            try {
                // Solicitar los datos al servidor
                const response = await fetch('/exportAerolineas');
                
                // Verifica si la solicitud fue exitosa
                if (!response.ok) {
                    throw new Error('Error al obtener los datos del servidor');
                }

                // Procesa la respuesta como JSON
                const data = await response.json();

                // Llama a la función para exportar los datos
                exportToExcelA(data);
            } catch (error) {
                console.error('Error al exportar los datos:', error);
                alert('Hubo un problema al exportar los datos. Por favor, intenta de nuevo.');
            }
        });
    </script>




    <!-- Destinos -->
    <script>
        // Función para exportar datos a Excel
         function exportToExcelD(data, filenameA = 'Hoteles.xlsx') {
            // Crear un nuevo libro de trabajo
            const workbook = new ExcelJS.Workbook();
            const worksheet = workbook.addWorksheet("Hoteles");

            // Definir estilo para las celdas (puedes ajustar los colores y alineación)
            const headerStyle = {
                font: { bold: true, color: { argb: "FFFFFF" }, size: 12 },
                fill: { type: 'pattern', pattern: 'solid', fgColor: { argb: "FF8A4C" } },
                alignment: { horizontal: 'center', vertical: 'middle' },
                border: {
                    top: { style: 'thin', color: { argb: '000000' } },  
                    left: { style: 'thin', color: { argb: '000000' } },
                    bottom: { style: 'thin', color: { argb: '000000' } }, 
                    right: { style: 'thin', color: { argb: '000000' } }, 
                },
            };

            const cellStyle = {
                alignment: { horizontal: 'left', vertical: 'middle' },
                border: {
                    top: { style: 'thin', color: { argb: '000000' } },  
                    left: { style: 'thin', color: { argb: '000000' } },
                    bottom: { style: 'thin', color: { argb: '000000' } }, 
                    right: { style: 'thin', color: { argb: '000000' } }, 
                },
            };

            // Agregar encabezados (titulos de columna) a la hoja
            const columns = Object.keys(data[0]).map(key => ({ header: key, key: key }));
            worksheet.columns = columns;

            // Aplicar estilos a las celdas de encabezado
            worksheet.getRow(1).eachCell((cell) => {
                cell.style = headerStyle;
            });

            // Agregar los datos a la hoja
            data.forEach((item) => {
                worksheet.addRow(item);
            });

            // Aplicar estilo a las celdas de datos
            worksheet.eachRow((row, rowIndex) => {
                if (rowIndex > 1) { // No aplicar estilo al encabezado
                    row.eachCell((cell) => {
                        cell.style = cellStyle;
                    });
                }
            });

            // Establecer tamaño automático de las columnas
            worksheet.columns.forEach(column => {
                const maxLength = column.values.reduce((max, value) => Math.max(max, String(value).length), 0);
                column.width = maxLength + 2; // Añadir espacio extra
            });

            // Descargar el archivo Excel
            workbook.xlsx.writeBuffer().then((buffer) => {
                const blob = new Blob([buffer], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = filenameA;
                link.click();
            });
        }

        // Evento al hacer clic en el botón
        document.getElementById('exportButtonD').addEventListener('click', async () => {
            try {
                // Solicitar los datos al servidor
                const response = await fetch('/exportarDestinos');
                
                // Verifica si la solicitud fue exitosa
                if (!response.ok) {
                    throw new Error('Error al obtener los datos del servidor');
                }

                // Procesa la respuesta como JSON
                const data = await response.json();

                // Llama a la función para exportar los datos
                exportToExcelD(data);
            } catch (error) {
                console.error('Error al exportar los datos:', error);
                alert('Hubo un problema al exportar los datos. Por favor, intenta de nuevo.');
            }
        });
    </script>


    <!-- clientes vuelos -->
    <script>
        // Función para exportar datos a Excel
         function exportToExcelCV(data, filenameA = 'clientesVuelos.xlsx') {
            // Crear un nuevo libro de trabajo
            const workbook = new ExcelJS.Workbook();
            const worksheet = workbook.addWorksheet("ClientesVuelos");

            // Definir estilo para las celdas (puedes ajustar los colores y alineación)
            const headerStyle = {
                font: { bold: true, color: { argb: "FFFFFF" }, size: 12 },
                fill: { type: 'pattern', pattern: 'solid', fgColor: { argb: "FF8A4C" } },
                alignment: { horizontal: 'center', vertical: 'middle' },
                border: {
                    top: { style: 'thin', color: { argb: '000000' } },  // Borde superior 
                    left: { style: 'thin', color: { argb: '000000' } }, // Borde izquierdo 
                    bottom: { style: 'thin', color: { argb: '000000' } }, // Borde inferior
                    right: { style: 'thin', color: { argb: '000000' } }, // Borde derecho 
                },
                
            };

            const cellStyle = {
                alignment: { horizontal: 'left', vertical: 'middle' },
                border: {
                    top: { style: 'thin', color: { argb: '000000' } },  
                    left: { style: 'thin', color: { argb: '000000' } }, 
                    bottom: { style: 'thin', color: { argb: '000000' } }, 
                    right: { style: 'thin', color: { argb: '000000' } }, 
                },
            };

            // Agregar encabezados (titulos de columna) a la hoja
            const columns = Object.keys(data[0]).map(key => ({ header: key, key: key }));
            worksheet.columns = columns;

            // Aplicar estilos a las celdas de encabezado
            worksheet.getRow(1).eachCell((cell) => {
                cell.style = headerStyle;
            });

            // Agregar los datos a la hoja
            data.forEach((item) => {
                worksheet.addRow(item);
            });

            // Aplicar estilo a las celdas de datos
            worksheet.eachRow((row, rowIndex) => {
                if (rowIndex > 1) { // No aplicar estilo al encabezado
                    row.eachCell((cell) => {
                        cell.style = cellStyle;
                    });
                }
            });

            // Establecer tamaño automático de las columnas
            worksheet.columns.forEach(column => {
                const maxLength = column.values.reduce((max, value) => Math.max(max, String(value).length), 0);
                column.width = maxLength + 2; // Añadir espacio extra
            });

            // Descargar el archivo Excel
            workbook.xlsx.writeBuffer().then((buffer) => {
                const blob = new Blob([buffer], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = filenameA;
                link.click();
            });
        }

        // Evento al hacer clic en el botón
        document.getElementById('exportButtonCV').addEventListener('click', async () => {
            try {
                // Solicitar los datos al servidor
                const response = await fetch('/exportarClientesV');
                
                // Verifica si la solicitud fue exitosa
                if (!response.ok) {
                    throw new Error('Error al obtener los datos del servidor');
                }

                // Procesa la respuesta como JSON
                const data = await response.json();

                // Llama a la función para exportar los datos
                exportToExcelCV(data);
            } catch (error) {
                console.error('Error al exportar los datos:', error);
                alert('Hubo un problema al exportar los datos. Por favor, intenta de nuevo.');
            }
        });
    </script>

     <!-- clientes Hoteles -->
     <script>
        // Función para exportar datos a Excel
         function exportToExcelCH(data, filenameH = 'clientesHoteles.xlsx') {
            // Crear un nuevo libro de trabajo
            const workbook = new ExcelJS.Workbook();
            const worksheet = workbook.addWorksheet("ClientesHoteles");

            // Definir estilo para las celdas (puedes ajustar los colores y alineación)
            const headerStyle = {
                font: { bold: true, color: { argb: "FFFFFF" }, size: 12 },
                fill: { type: 'pattern', pattern: 'solid', fgColor: { argb: "FF8A4C" } },
                alignment: { horizontal: 'center', vertical: 'middle' },
                border: {
                    top: { style: 'thin', color: { argb: '000000' } },  
                    left: { style: 'thin', color: { argb: '000000' } }, 
                    bottom: { style: 'thin', color: { argb: '000000' } }, 
                    right: { style: 'thin', color: { argb: '000000' } }, 
                },
                
            };

            const cellStyle = {
                alignment: { horizontal: 'left', vertical: 'middle' },
                border: {
                    top: { style: 'thin', color: { argb: '000000' } },  
                    left: { style: 'thin', color: { argb: '000000' } }, 
                    bottom: { style: 'thin', color: { argb: '000000' } }, 
                    right: { style: 'thin', color: { argb: '000000' } }, 
                },
            };

            // Agregar encabezados (titulos de columna) a la hoja
            const columns = Object.keys(data[0]).map(key => ({ header: key, key: key }));
            worksheet.columns = columns;

            // Aplicar estilos a las celdas de encabezado
            worksheet.getRow(1).eachCell((cell) => {
                cell.style = headerStyle;
            });

            // Agregar los datos a la hoja
            data.forEach((item) => {
                worksheet.addRow(item);
            });

            // Aplicar estilo a las celdas de datos
            worksheet.eachRow((row, rowIndex) => {
                if (rowIndex > 1) { // No aplicar estilo al encabezado
                    row.eachCell((cell) => {
                        cell.style = cellStyle;
                    });
                }
            });

            // Establecer tamaño automático de las columnas
            worksheet.columns.forEach(column => {
                const maxLength = column.values.reduce((max, value) => Math.max(max, String(value).length), 0);
                column.width = maxLength + 2; // Añadir espacio extra
            });

            // Descargar el archivo Excel
            workbook.xlsx.writeBuffer().then((buffer) => {
                const blob = new Blob([buffer], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = filenameH;
                link.click();
            });
        }

        // Evento al hacer clic en el botón
        document.getElementById('exportButtonCH').addEventListener('click', async () => {
            try {
                // Solicitar los datos al servidor
                const response = await fetch('/exportarClientesH');
                
                // Verifica si la solicitud fue exitosa
                if (!response.ok) {
                    throw new Error('Error al obtener los datos del servidor');
                }

                // Procesa la respuesta como JSON
                const data = await response.json();

                // Llama a la función para exportar los datos
                exportToExcelCH(data);
            } catch (error) {
                console.error('Error al exportar los datos:', error);
                alert('Hubo un problema al exportar los datos. Por favor, intenta de nuevo.');
            }
        });
    </script>

</div>

@session('exitodesadd')
    <script>
    Swal.fire({
        icon: "success",
        title: "El destino fue guardado correctamente",
        showConfirmButton: false,
        timer: 1500
    });
    </script>
@endsession

@session('exitoaeroadd')
    <script>
    Swal.fire({
        icon: "success",
        title: "La aerolinea fue guardado correctamente",
        showConfirmButton: false,
        timer: 1500
    });
    </script>
@endsession

@session('exitoClienadd')
    <script>
    Swal.fire({
        icon: "success",
        title: "El cliente fue guardado correctamente",
        showConfirmButton: false,
        timer: 1500
    });
    </script>
@endsession


@session('exitoDestdel')
    <script>
    Swal.fire({
        icon: "success",
        title: "El destino fue eliminado correctamente",
        showConfirmButton: false,
        timer: 1500
    });
    </script>
@endsession

@session('exitoAerodel')
    <script>
    Swal.fire({
        icon: "success",
        title: "La aerolinea fue eliminada correctamente",
        showConfirmButton: false,
        timer: 1500
    });
    </script>
@endsession

@session('exitocliedel')
    <script>
    Swal.fire({
        icon: "success",
        title: "El cliente fue eliminada correctamente",
        showConfirmButton: false,
        timer: 1500
    });
    </script>
@endsession



@include ('modales.deleteClienRepo')
@include ('modales.deleteAeroRepo')
@include ('modales.deleteDestinoRepo')

@endsection