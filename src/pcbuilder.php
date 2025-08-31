<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <title>PC Builder - TECNOMATICA</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: #fff;
            min-height: 100vh;
        }

        .header {
            background: rgba(0, 0, 0, 0.2);
            padding: 20px 0;
            text-align: center;
            backdrop-filter: blur(10px);
        }

        .header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
            background: linear-gradient(45deg, #00d4ff, #ff6b6b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .back-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: #fff;
            padding: 12px 20px;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .back-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .pc-builder {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-top: 20px;
        }

        .components-section {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 25px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .summary-section {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 25px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            height: fit-content;
            position: sticky;
            top: 20px;
        }

        .component-group {
            margin-bottom: 30px;
            background: rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            padding: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .component-title {
            font-size: 1.4em;
            margin-bottom: 15px;
            color: #00d4ff;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .component-options {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .component-option {
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid transparent;
            border-radius: 10px;
            padding: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .component-option:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .component-option.selected {
            border-color: #00d4ff;
            background: rgba(0, 212, 255, 0.2);
            box-shadow: 0 0 20px rgba(0, 212, 255, 0.3);
        }

        .option-info {
            flex: 1;
        }

        .option-name {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .option-specs {
            font-size: 0.9em;
            color: #ccc;
        }

        .option-price {
            font-size: 1.2em;
            font-weight: bold;
            color: #00ff88;
        }

        .summary-content {
            margin-bottom: 20px;
        }

        .selected-component {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 8px;
            margin-bottom: 10px;
            border-left: 4px solid #00d4ff;
        }

        .total-price {
            font-size: 2em;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
            color: #00ff88;
            text-shadow: 0 0 10px rgba(0, 255, 136, 0.5);
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .btn {
            padding: 15px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 1.1em;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(45deg, #00d4ff, #0099cc);
            color: #fff;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, #0099cc, #00d4ff);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 212, 255, 0.4);
        }

        .btn-secondary {
            background: linear-gradient(45deg, #ff6b6b, #ee5a52);
            color: #fff;
        }

        .btn-secondary:hover {
            background: linear-gradient(45deg, #ee5a52, #ff6b6b);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4);
        }

        .compatibility-indicator {
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin-left: 10px;
        }

        .compatible {
            background-color: #00ff88;
            box-shadow: 0 0 5px rgba(0, 255, 136, 0.5);
        }

        .incompatible {
            background-color: #ff4757;
            box-shadow: 0 0 5px rgba(255, 71, 87, 0.5);
        }

        @media (max-width: 768px) {
            .pc-builder {
                grid-template-columns: 1fr;
            }
            
            .summary-section {
                position: static;
            }
        }

        .animated-bg {
            background: linear-gradient(45deg, 
                rgba(0, 212, 255, 0.1), 
                rgba(255, 107, 107, 0.1), 
                rgba(0, 255, 136, 0.1)
            );
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .performance-meter {
            margin: 20px 0;
            padding: 15px;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 10px;
        }

        .performance-bar {
            width: 100%;
            height: 8px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 4px;
            margin: 10px 0;
            overflow: hidden;
        }

        .performance-fill {
            height: 100%;
            background: linear-gradient(90deg, #ff4757, #ff6b6b, #ffa502, #2ed573, #00d4ff);
            border-radius: 4px;
            transition: width 0.5s ease;
        }
    </style>
</head>
<body class="animated-bg">
    <div class="header">
        <button class="back-btn" onclick="window.history.back()">
            <i class="fas fa-arrow-left"></i> Volver
        </button>
        <h1><i class="fas fa-desktop"></i> PC BUILDER</h1>
        <p>Configura tu PC ideal con TECNOMATICA</p>
    </div>

    <div class="container">
        <div class="pc-builder">
            <div class="components-section">
                <h2><i class="fas fa-cogs"></i> Componentes</h2>
                
                <!-- Procesador -->
                <div class="component-group">
                    <div class="component-title">
                        <i class="fas fa-microchip"></i> Procesador (CPU)
                    </div>
                    <div class="component-options" data-component="cpu">
                        <div class="component-option" data-price="3500" data-performance="60">
                            <div class="option-info">
                                <div class="option-name">AMD Ryzen 5 5600X</div>
                                <div class="option-specs">6 núcleos, 12 hilos, 3.7GHz</div>
                            </div>
                            <div class="option-price">$3,500</div>
                            <div class="compatibility-indicator compatible"></div>
                        </div>
                        <div class="component-option" data-price="5200" data-performance="80">
                            <div class="option-info">
                                <div class="option-name">Intel Core i7-12700K</div>
                                <div class="option-specs">12 núcleos, 20 hilos, 3.6GHz</div>
                            </div>
                            <div class="option-price">$5,200</div>
                            <div class="compatibility-indicator compatible"></div>
                        </div>
                        <div class="component-option" data-price="8500" data-performance="95">
                            <div class="option-info">
                                <div class="option-name">AMD Ryzen 9 7900X</div>
                                <div class="option-specs">12 núcleos, 24 hilos, 4.7GHz</div>
                            </div>
                            <div class="option-price">$8,500</div>
                            <div class="compatibility-indicator compatible"></div>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta Gráfica -->
                <div class="component-group">
                    <div class="component-title">
                        <i class="fas fa-tv"></i> Tarjeta Gráfica (GPU)
                    </div>
                    <div class="component-options" data-component="gpu">
                        <div class="component-option" data-price="4800" data-performance="70">
                            <div class="option-info">
                                <div class="option-name">NVIDIA RTX 4060</div>
                                <div class="option-specs">8GB GDDR6, Ray Tracing</div>
                            </div>
                            <div class="option-price">$4,800</div>
                            <div class="compatibility-indicator compatible"></div>
                        </div>
                        <div class="component-option" data-price="8200" data-performance="85">
                            <div class="option-info">
                                <div class="option-name">NVIDIA RTX 4070 Ti</div>
                                <div class="option-specs">12GB GDDR6X, DLSS 3</div>
                            </div>
                            <div class="option-price">$8,200</div>
                            <div class="compatibility-indicator compatible"></div>
                        </div>
                        <div class="component-option" data-price="15500" data-performance="98">
                            <div class="option-info">
                                <div class="option-name">NVIDIA RTX 4080</div>
                                <div class="option-specs">16GB GDDR6X, 4K Gaming</div>
                            </div>
                            <div class="option-price">$15,500</div>
                            <div class="compatibility-indicator compatible"></div>
                        </div>
                    </div>
                </div>

                <!-- Memoria RAM -->
                <div class="component-group">
                    <div class="component-title">
                        <i class="fas fa-memory"></i> Memoria RAM
                    </div>
                    <div class="component-options" data-component="ram">
                        <div class="component-option" data-price="1200" data-performance="40">
                            <div class="option-info">
                                <div class="option-name">16GB DDR4 3200MHz</div>
                                <div class="option-specs">2x8GB, CL16</div>
                            </div>
                            <div class="option-price">$1,200</div>
                            <div class="compatibility-indicator compatible"></div>
                        </div>
                        <div class="component-option" data-price="1850" data-performance="55">
                            <div class="option-info">
                                <div class="option-name">32GB DDR4 3600MHz</div>
                                <div class="option-specs">2x16GB, CL18</div>
                            </div>
                            <div class="option-price">$1,850</div>
                            <div class="compatibility-indicator compatible"></div>
                        </div>
                        <div class="component-option" data-price="2400" data-performance="65">
                            <div class="option-info">
                                <div class="option-name">32GB DDR5 5600MHz</div>
                                <div class="option-specs">2x16GB, CL36</div>
                            </div>
                            <div class="option-price">$2,400</div>
                            <div class="compatibility-indicator compatible"></div>
                        </div>
                    </div>
                </div>

                <!-- Almacenamiento -->
                <div class="component-group">
                    <div class="component-title">
                        <i class="fas fa-hdd"></i> Almacenamiento
                    </div>
                    <div class="component-options" data-component="storage">
                        <div class="component-option" data-price="900" data-performance="50">
                            <div class="option-info">
                                <div class="option-name">SSD 500GB NVMe</div>
                                <div class="option-specs">PCIe 3.0, 3500 MB/s</div>
                            </div>
                            <div class="option-price">$900</div>
                            <div class="compatibility-indicator compatible"></div>
                        </div>
                        <div class="component-option" data-price="1400" data-performance="70">
                            <div class="option-info">
                                <div class="option-name">SSD 1TB NVMe</div>
                                <div class="option-specs">PCIe 4.0, 7000 MB/s</div>
                            </div>
                            <div class="option-price">$1,400</div>
                            <div class="compatibility-indicator compatible"></div>
                        </div>
                        <div class="component-option" data-price="2200" data-performance="75">
                            <div class="option-info">
                                <div class="option-name">SSD 2TB NVMe + HDD 2TB</div>
                                <div class="option-specs">PCIe 4.0 + 7200 RPM</div>
                            </div>
                            <div class="option-price">$2,200</div>
                            <div class="compatibility-indicator compatible"></div>
                        </div>
                    </div>
                </div>

                <!-- Fuente de Poder -->
                <div class="component-group">
                    <div class="component-title">
                        <i class="fas fa-plug"></i> Fuente de Poder
                    </div>
                    <div class="component-options" data-component="psu">
                        <div class="component-option" data-price="1100" data-performance="60">
                            <div class="option-info">
                                <div class="option-name">650W 80+ Gold</div>
                                <div class="option-specs">Modular, Certificada</div>
                            </div>
                            <div class="option-price">$1,100</div>
                            <div class="compatibility-indicator compatible"></div>
                        </div>
                        <div class="component-option" data-price="1600" data-performance="75">
                            <div class="option-info">
                                <div class="option-name">750W 80+ Gold</div>
                                <div class="option-specs">Full Modular, RGB</div>
                            </div>
                            <div class="option-price">$1,600</div>
                            <div class="compatibility-indicator compatible"></div>
                        </div>
                        <div class="component-option" data-price="2100" data-performance="85">
                            <div class="option-info">
                                <div class="option-name">850W 80+ Platinum</div>
                                <div class="option-specs">Full Modular, Premium</div>
                            </div>
                            <div class="option-price">$2,100</div>
                            <div class="compatibility-indicator compatible"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="summary-section">
                <h2><i class="fas fa-clipboard-list"></i> Resumen de la PC</h2>
                
                <div class="performance-meter">
                    <h4>Rendimiento General</h4>
                    <div class="performance-bar">
                        <div class="performance-fill" id="performanceBar" style="width: 0%"></div>
                    </div>
                    <span id="performanceText">Selecciona componentes</span>
                </div>
                
                <div class="summary-content" id="summaryContent">
                    <div class="selected-component">
                        <span>No hay componentes seleccionados</span>
                    </div>
                </div>
                
                <div class="total-price" id="totalPrice">$0</div>
                
                <div class="action-buttons">
                    <button class="btn btn-primary" onclick="requestQuote()">
                        <i class="fas fa-calculator"></i> Solicitar Cotización
                    </button>
                    <button class="btn btn-secondary" onclick="clearBuild()">
                        <i class="fas fa-trash"></i> Limpiar Build
                    </button>
                    <button class="btn btn-secondary" onclick="shareBuild()">
                        <i class="fas fa-share"></i> Compartir Build
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let selectedComponents = {};
        let totalPrice = 0;
        let totalPerformance = 0;

        // Inicializar event listeners
        document.addEventListener('DOMContentLoaded', function() {
            const componentOptions = document.querySelectorAll('.component-option');
            
            componentOptions.forEach(option => {
                option.addEventListener('click', function() {
                    selectComponent(this);
                });
            });
        });

        function selectComponent(element) {
            const componentGroup = element.closest('.component-options');
            const componentType = componentGroup.getAttribute('data-component');
            const price = parseInt(element.getAttribute('data-price'));
            const performance = parseInt(element.getAttribute('data-performance'));
            const componentName = element.querySelector('.option-name').textContent;
            
            // Remover selección anterior del mismo tipo
            componentGroup.querySelectorAll('.component-option').forEach(opt => {
                opt.classList.remove('selected');
            });
            
            // Seleccionar el nuevo componente
            element.classList.add('selected');
            
            // Actualizar componente seleccionado
            if (selectedComponents[componentType]) {
                totalPrice -= selectedComponents[componentType].price;
                totalPerformance -= selectedComponents[componentType].performance;
            }
            
            selectedComponents[componentType] = {
                name: componentName,
                price: price,
                performance: performance
            };
            
            totalPrice += price;
            totalPerformance += performance;
            
            updateSummary();
            updatePerformance();
        }

        function updateSummary() {
            const summaryContent = document.getElementById('summaryContent');
            const totalPriceElement = document.getElementById('totalPrice');
            
            if (Object.keys(selectedComponents).length === 0) {
                summaryContent.innerHTML = '<div class="selected-component"><span>No hay componentes seleccionados</span></div>';
                totalPriceElement.textContent = '$0';
                return;
            }
            
            let summaryHTML = '';
            const componentLabels = {
                'cpu': 'Procesador',
                'gpu': 'Tarjeta Gráfica',
                'ram': 'Memoria RAM',
                'storage': 'Almacenamiento',
                'psu': 'Fuente de Poder'
            };
            
            for (const [type, component] of Object.entries(selectedComponents)) {
                summaryHTML += `
                    <div class="selected-component">
                        <div>
                            <strong>${componentLabels[type]}</strong><br>
                            ${component.name}
                        </div>
                        <div class="option-price">$${component.price.toLocaleString()}</div>
                    </div>
                `;
            }
            
            summaryContent.innerHTML = summaryHTML;
            totalPriceElement.textContent = `$${totalPrice.toLocaleString()}`;
        }

        function updatePerformance() {
            const performanceBar = document.getElementById('performanceBar');
            const performanceText = document.getElementById('performanceText');
            
            const componentCount = Object.keys(selectedComponents).length;
            const maxComponents = 5;
            const avgPerformance = componentCount > 0 ? totalPerformance / componentCount : 0;
            const performancePercentage = Math.min((avgPerformance / 100) * 100, 100);
            
            performanceBar.style.width = performancePercentage + '%';
            
            let performanceLevel = '';
            if (performancePercentage < 40) {
                performanceLevel = 'Básico';
            } else if (performancePercentage < 70) {
                performanceLevel = 'Bueno';
            } else if (performancePercentage < 90) {
                performanceLevel = 'Excelente';
            } else {
                performanceLevel = 'Extremo';
            }
            
            performanceText.textContent = `${Math.round(performancePercentage)}% - ${performanceLevel}`;
        }

        function requestQuote() {
            if (Object.keys(selectedComponents).length === 0) {
                alert('Por favor selecciona al menos un componente');
                return;
            }
            
            let message = 'Hola, me interesa una cotización para esta PC:\n\n';
            
            const componentLabels = {
                'cpu': 'Procesador',
                'gpu': 'Tarjeta Gráfica',
                'ram': 'Memoria RAM',
                'storage': 'Almacenamiento',
                'psu': 'Fuente de Poder'
            };
            
            for (const [type, component] of Object.entries(selectedComponents)) {
                message += `${componentLabels[type]}: ${component.name} - $${component.price.toLocaleString()}\n`;
            }
            
            message += `\nTotal: $${totalPrice.toLocaleString()}`;
            
            const whatsappURL = `https://api.whatsapp.com/send?phone=9933484764&text=${encodeURIComponent(message)}`;
            window.open(whatsappURL, '_blank');
        }

        function clearBuild() {
            if (confirm('¿Estás seguro de que quieres limpiar toda la configuración?')) {
                selectedComponents = {};
                totalPrice = 0;
                totalPerformance = 0;
                
                document.querySelectorAll('.component-option.selected').forEach(option => {
                    option.classList.remove('selected');
                });
                
                updateSummary();
                updatePerformance();
            }
        }

        function shareBuild() {
            if (Object.keys(selectedComponents).length === 0) {
                alert('No hay componentes seleccionados para compartir');
                return;
            }
            
            let buildText = 'Mi PC Build en TECNOMATICA:\n\n';
            
            const componentLabels = {
                'cpu': 'CPU',
                'gpu': 'GPU',
                'ram': 'RAM',
                'storage': 'Storage',
                'psu': 'PSU'
            };
            
            for (const [type, component] of Object.entries(selectedComponents)) {
                buildText += `${componentLabels[type]}: ${component.name}\n`;
            }
            
            buildText += `\nTotal: $${totalPrice.toLocaleString()}`;
            
            if (navigator.share) {
                navigator.share({
                    title: 'Mi PC Build - TECNOMATICA',
                    text: buildText
                });
            } else {
                navigator.clipboard.writeText(buildText).then(() => {
                    alert('Build copiado al portapapeles');
                });
            }
        }
    </script>
</body>
</html>