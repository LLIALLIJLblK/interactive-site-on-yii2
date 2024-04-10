


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <main>

   <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src=https://i.pinimg.com/originals/e3/0c/b6/e30cb61598dafa472e89be8bc1540c0a.jpg class="img-fluid" alt="...">
    </div>
    <div class="carousel-item">
      <img src=https://granoscorretora.com.br/wp-content/uploads/2018/11/aid120456_1hands_soybean_w.jpg class="img-fluid"  alt="...">
    </div>
    <div class="carousel-item">
      <img src=https://iranbentoniteco.com/cms/wp-content/uploads/2022/04/bentonite-for-animal-feed-additives-opt.jpg class="img-fluid" alt="...">
    </div>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Предыдущий</span>
  </button>

  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Следующий</span>
  </button>

</div>

        <h1>Производственный калькулятор</h1>


       

        <h1>Калькулятор</h1>
    <form>
        <label for="month">Выберите месяц:</label>
        <select id="month">
            <option value="январь">январь</option>
            <option value="февраль">февраль</option>
            <option value="август">август</option>
            <option value="сентябрь">сентябрь</option>
            <option value="октябрь">октябрь</option>
            <option value="ноябрь">ноябрь</option>
        </select>

        <label for="rawMaterial">Выберите тип сырья:</label>
        <select id="rawMaterial">
            <option value="шрот">шрот</option>
            <option value="жмых">жмых</option>
            <option value="соя">соя</option>
        </select>

        <label for="tonnage">Выберите тоннаж:</label>
        <select id="tonnage">
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="75">75</option>
            <option value="100">100</option>
        </select>

        <button type="button" onclick="calculate()">Рассчитать</button>
    </form>

    <div id="result"></div>

    </main>
    <script>
        function calculate() {
            // Получение выбранных значений из формы
            var month = document.getElementById("month").value;
            var rawMaterial = document.getElementById("rawMaterial").value;
            var tonnage = document.getElementById("tonnage").value;

            // Выполнение расчета
            var result = month.length + rawMaterial.length + parseInt(tonnage);

            // Отображение результата
            document.getElementById("result").innerHTML = "Сумма: " + result;
        }
    </script>
</body>
</html>