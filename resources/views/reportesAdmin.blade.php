@extends('layouts.plantilla')

@section('content')

<link href="{{ asset('/css/adminDestinos.css') }}" rel="stylesheet">
<!-- Exportacion en Ecxel -->
<script src="https://cdn.jsdelivr.net/npm/exceljs/dist/exceljs.min.js"></script>

<!-- Exportacion en pdf -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.31/jspdf.plugin.autotable.min.js"></script>

<div class="grid grid-cols-3 gap-4 gap-4 h-auto min-h-full ">

    {{-- container tabla --}}
    <div class="container pt-10  col-start-1 col-end-4">

        <div class="mb-5 flex items-center align-middle">
            <i class="fa-solid fa-file fa-2xl"></i>
            <span class="text-[40px] ms-4">Generar Reportes</span>
        </div>

        <div class="relative  overflow-x-auto shadow-md sm:rounded-lg border-t-4 border-t-orange-500">
            <div class="mb-5 mt-3 flex items-center align-middle text-center gap-5  justify-self-center">
                <h5 class="mb-1 w-60 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white"></i>Formato Excel</h5>
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
                    <div class= " mt-5 mb-5 text-white  self-end bg-blue-600 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <button id="exportButtonD">
                            Generar Reporte Hoteles
                        </button>
                    </div>
                </div>

                <div>  
                     <div class= " mt-5 mb-5 text-white  self-end bg-blue-600 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <button id="exportButtonCV">
                            Generar Reporte Clientes Vuelos
                        </button>
                    </div>
                </div>

                <div> 
                     <div class= " mt-5 mb-5 text-white  self-end bg-blue-600 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <button id="exportButtonCH">
                            Generar Reporte Clientes Hoteles
                        </button>
                    </div>
                </div>
                
            </div>

            <!-- Botones PDF -->

            <div class="mb-5 mt-3 flex items-center align-middle text-center gap-5  justify-self-center">
                <h5 class="mb-1 w-60 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white"></i>Formato PDF</h5>
            </div>

            <div id="date-range-picker2" date-rangepicker class=" ms-4 grid grid-cols-4 gap-4 mb-8" datepicker-format="dd-mm-yyyy">
                <div>  
                    <div class= " mt-5 mb-5 text-white  self-end bg-blue-600 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <button id="exportPDFButtonV">
                            Generar Reporte Vuelos
                        </button>
                    </div>
                </div>

                <div>  
                    <div class= " mt-5 mb-5 text-white  self-end bg-blue-600 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <button id="exportPDFButtonH">
                            Generar Reporte Hoteles
                        </button>
                    </div>
                </div>

                <div>  
                     <div class= " mt-5 mb-5 text-white  self-end bg-blue-600 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <button id="exportPDFButtonCV">
                            Generar Reporte Clientes Vuelos
                        </button>
                    </div>
                </div>

                <div>  
                     <div class= " mt-5 mb-5 text-white  self-end bg-blue-600 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <button id="exportPDFButtonCH">
                            Generar Reporte Clientes Hoteles
                        </button>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>

   
    
    <!-- Aerolioneas en Excel-->
    <script>
        // Exportarcion de datos a Excel
        function exportToExcelA(data, filenameA = 'Vuelos.xlsx') {
            // Creacion un nuevo libro
            const workbook = new ExcelJS.Workbook();
            const worksheet = workbook.addWorksheet("Vuelos");

            // Estilo para las celdas 
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

            // Agregar encabezados
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

            // Tamaño automático de las columnas
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

        // Funcion al dar click en el boton
        document.getElementById('exportButton').addEventListener('click', async () => {
            try {
                // Soliciar datos
                const response = await fetch('/exportAerolineas');
                
                // Verifica si la solicitud fue exitosa
                if (!response.ok) {
                    throw new Error('Error al obtener los datos del servidor');
                }

                // Procesa la respuesta como JSON
                const data = await response.json();

                // Colocar los datos en el Excel
                exportToExcelA(data);
            } catch (error) {
                console.error('Error al exportar los datos:', error);
                alert('Hubo un problema al exportar los datos. Por favor, intenta de nuevo.');
            }
        });
    </script>

    <!-- Aerolioneas en PDF-->
    <script>
        async function exportToPDFV(data, filename = 'Vuelos.pdf') {
        const { jsPDF } = window.jspdf;

        // Crear el archivo
        const doc = new jsPDF();

        // Definicion de encabezados y datos de las tablas
        const columns = Object.keys(data[0]);
        const rows = data.map(item => columns.map(key => item[key]));

        // Agregar un título
        doc.setFontSize(16);
        doc.text("Reporte de Vuelos", 14, 20);

        // Agregar la tabla 
        doc.autoTable({
            head: [columns], 
            body: rows,      
            startY: 30,      
            styles: {
                fontSize: 10,
                cellPadding: 2,
                halign: 'center', 
            },
            headStyles: {
                fillColor: [255, 138, 76], 
                textColor: [255, 255, 255],
                fontStyle: 'bold',
            },
        });

        // Descargar el PDF
        doc.save(filename);
    }

    // Funcion al dar click en el boton
    document.getElementById('exportPDFButtonV').addEventListener('click', async () => {
        try {
            // Solicitar los datos
            const response = await fetch('/exportAerolineas');
            
            // Verificacion de solicitud
            if (!response.ok) {
                throw new Error('Error al obtener los datos del servidor');
            }

            // Procesa la respuesta como JSON
            const data = await response.json();

            // Colocar los datos en la tabla de PDF
            exportToPDFV(data);
        } catch (error) {
            console.error('Error al exportar los datos:', error);
            alert('Hubo un problema al exportar los datos. Por favor, intenta de nuevo.');
        }
    });
    </script>




    <!-- Hoteles en Excel -->
    <script>

         function exportToExcelD(data, filenameA = 'Hoteles.xlsx') {
            const workbook = new ExcelJS.Workbook();
            const worksheet = workbook.addWorksheet("Hoteles");

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

            const columns = Object.keys(data[0]).map(key => ({ header: key, key: key }));
            worksheet.columns = columns;

            worksheet.getRow(1).eachCell((cell) => {
                cell.style = headerStyle;
            });

            data.forEach((item) => {
                worksheet.addRow(item);
            });

            worksheet.eachRow((row, rowIndex) => {
                if (rowIndex > 1) { 
                    row.eachCell((cell) => {
                        cell.style = cellStyle;
                    });
                }
            });

            worksheet.columns.forEach(column => {
                const maxLength = column.values.reduce((max, value) => Math.max(max, String(value).length), 0);
                column.width = maxLength + 2; 
            });

            workbook.xlsx.writeBuffer().then((buffer) => {
                const blob = new Blob([buffer], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = filenameA;
                link.click();
            });
        }


        document.getElementById('exportButtonD').addEventListener('click', async () => {
            try {
                const response = await fetch('/exportarDestinos');
                
                if (!response.ok) {
                    throw new Error('Error al obtener los datos del servidor');
                }

                const data = await response.json();

                exportToExcelD(data);
            } catch (error) {
                console.error('Error al exportar los datos:', error);
                alert('Hubo un problema al exportar los datos. Por favor, intenta de nuevo.');
            }
        });
    </script>

    <!-- Hoteles en PDF -->
    <script>
            async function exportToPDFH(data, filename = 'Hoteles.pdf') {
            const { jsPDF } = window.jspdf;

            const doc = new jsPDF();

            const columns = Object.keys(data[0]);
            const rows = data.map(item => columns.map(key => item[key]));

            doc.setFontSize(16);
            doc.text("Reporte de Hoteles", 14, 20);

            doc.autoTable({
                head: [columns], 
                body: rows,   
                startY: 30,   
                styles: {
                    fontSize: 10,
                    cellPadding: 2,
                    halign: 'center', 
                },
                headStyles: {
                    fillColor: [255, 138, 76], 
                    textColor: [255, 255, 255],
                    fontStyle: 'bold',
                },
            });

            doc.save(filename);
        }

        document.getElementById('exportPDFButtonH').addEventListener('click', async () => {
            try {
                const response = await fetch('/exportarDestinos');
                
                if (!response.ok) {
                    throw new Error('Error al obtener los datos del servidor');
                }

                const data = await response.json();

                exportToPDFH(data);
            } catch (error) {
                console.error('Error al exportar los datos:', error);
                alert('Hubo un problema al exportar los datos. Por favor, intenta de nuevo.');
            }
        });
    </script>




    <!-- clientes vuelos en Excel-->
    <script>
         function exportToExcelCV(data, filenameA = 'clientesVuelos.xlsx') {
            const workbook = new ExcelJS.Workbook();
            const worksheet = workbook.addWorksheet("ClientesVuelos");

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

            const columns = Object.keys(data[0]).map(key => ({ header: key, key: key }));
            worksheet.columns = columns;

            worksheet.getRow(1).eachCell((cell) => {
                cell.style = headerStyle;
            });

            data.forEach((item) => {
                worksheet.addRow(item);
            });

            worksheet.eachRow((row, rowIndex) => {
                if (rowIndex > 1) { 
                    row.eachCell((cell) => {
                        cell.style = cellStyle;
                    });
                }
            });

            worksheet.columns.forEach(column => {
                const maxLength = column.values.reduce((max, value) => Math.max(max, String(value).length), 0);
                column.width = maxLength + 2; 
            });

            workbook.xlsx.writeBuffer().then((buffer) => {
                const blob = new Blob([buffer], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = filenameA;
                link.click();
            });
        }

        document.getElementById('exportButtonCV').addEventListener('click', async () => {
            try {
                const response = await fetch('/exportarClientesV');
                
                if (!response.ok) {
                    throw new Error('Error al obtener los datos del servidor');
                }

                const data = await response.json();

                exportToExcelCV(data);
            } catch (error) {
                console.error('Error al exportar los datos:', error);
                alert('Hubo un problema al exportar los datos. Por favor, intenta de nuevo.');
            }
        });
    </script>

     <!-- Clientes Vuelos en PDF -->
     <script>
            async function exportToPDFCV(data, filename = 'ClientesVuelos.pdf') {
            const { jsPDF } = window.jspdf;

            const doc = new jsPDF();

            const columns = Object.keys(data[0]);
            const rows = data.map(item => columns.map(key => item[key]));

            doc.setFontSize(16);
            doc.text("Reporte de Clientes-Vuelos", 14, 20);

            doc.autoTable({
                head: [columns],
                body: rows,      
                startY: 30,      
                styles: {
                    fontSize: 10,
                    cellPadding: 2,
                    halign: 'center', 
                },
                headStyles: {
                    fillColor: [255, 138, 76], 
                    textColor: [255, 255, 255],
                    fontStyle: 'bold',
                },
            });

            doc.save(filename);
        }

        document.getElementById('exportPDFButtonCV').addEventListener('click', async () => {
            try {
                const response = await fetch('/exportarClientesV');
                
                if (!response.ok) {
                    throw new Error('Error al obtener los datos del servidor');
                }

                const data = await response.json();

                exportToPDFCV(data);
            } catch (error) {
                console.error('Error al exportar los datos:', error);
                alert('Hubo un problema al exportar los datos. Por favor, intenta de nuevo.');
            }
        });
    </script>




     <!-- clientes Hoteles Excel -->
     <script>
         function exportToExcelCH(data, filenameH = 'clientesHoteles.xlsx') {
            const workbook = new ExcelJS.Workbook();
            const worksheet = workbook.addWorksheet("ClientesHoteles");

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

            const columns = Object.keys(data[0]).map(key => ({ header: key, key: key }));
            worksheet.columns = columns;

            worksheet.getRow(1).eachCell((cell) => {
                cell.style = headerStyle;
            });

            data.forEach((item) => {
                worksheet.addRow(item);
            });

            worksheet.eachRow((row, rowIndex) => {
                if (rowIndex > 1) { 
                    row.eachCell((cell) => {
                        cell.style = cellStyle;
                    });
                }
            });

            worksheet.columns.forEach(column => {
                const maxLength = column.values.reduce((max, value) => Math.max(max, String(value).length), 0);
                column.width = maxLength + 2; 
            });

            workbook.xlsx.writeBuffer().then((buffer) => {
                const blob = new Blob([buffer], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = filenameH;
                link.click();
            });
        }

        document.getElementById('exportButtonCH').addEventListener('click', async () => {
            try {
                const response = await fetch('/exportarClientesH');
                
                if (!response.ok) {
                    throw new Error('Error al obtener los datos del servidor');
                }

                const data = await response.json();

                exportToExcelCH(data);
            } catch (error) {
                console.error('Error al exportar los datos:', error);
                alert('Hubo un problema al exportar los datos. Por favor, intenta de nuevo.');
            }
        });
    </script>

     <!-- Clientes Hoteles en PDF -->
     <script>
            async function exportToPDFCH(data, filename = 'ClientesHoteles.pdf') {
            const { jsPDF } = window.jspdf;

            const doc = new jsPDF();

            const columns = Object.keys(data[0]);
            const rows = data.map(item => columns.map(key => item[key]));

            doc.setFontSize(16);
            doc.text("Reporte de Clientes-Hoteles", 14, 20);

            doc.autoTable({
                head: [columns], 
                body: rows,  
                startY: 30,     
                styles: {
                    fontSize: 10,
                    cellPadding: 2,
                    halign: 'center', 
                },
                headStyles: {
                    fillColor: [255, 138, 76], 
                    textColor: [255, 255, 255],
                    fontStyle: 'bold',
                },
            });

            doc.save(filename);
        }

        document.getElementById('exportPDFButtonCH').addEventListener('click', async () => {
            try {
                const response = await fetch('/exportarClientesH');
                
                if (!response.ok) {
                    throw new Error('Error al obtener los datos del servidor');
                }

                const data = await response.json();

                exportToPDFCH(data);
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