<script lang="ts">
  import ApexCharts from "$lib/ApexCharts.svelte";

  const chartOptions = {
    legend: { show: false },
    chart: {
      toolbar: { show: false },
    },
    xaxis: {
      categories: [2008,2009,2009,2010,2011,2013,2014,2015,2016,2017,2018,2019,2020,2021,2022,2023]
    }
  };
  const chartSeries: Array<any> = [{
    serie: 'Dépenses par année',
    data: [50000,52000,54000,58000,61000,63000,67000,70000,74000,77000,79000,81000,85000,89000,95000,101000,110000],
  }]
</script>

<section class="w-full h-screen bg-gradient-to-b from-white from-10% to-[#9DCDE4] flex justify-center items-center relative">
  <div class="w-7/12 flex flex-col gap-32">
    <h2 class="text-blue-dark text-4xl font-semibold text-center">Dépenses de fonctionnement d'Issy-les-Moulineaux par types de services à la population</h2>

    <div class="flex justify-between">
      <div class="px-12 py-16 rounded-lg text-white bg-[#8BCBEA] text-5xl text-center">
        <p>En 2021</p>
        <p class="pt-8">31M €</p>
      </div>

      <div class="px-12 py-16 rounded-lg text-white bg-blue text-5xl text-center">
        <p>En 2022</p>
        <p class="pt-8">31M €</p>
      </div>

      <div class="px-12 py-16 rounded-lg text-white bg-blue-dark text-5xl text-center">
        <p>En 2023</p>
        <p class="pt-8">31M €</p>
      </div>
    </div>

    <p class="text-2xl text-blue-dark">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pretium blandit consectetur. Fusce sed accumsan metus, vitae fringilla augue. Duis tristique ligula vitae ante lacinia porta. Aliquam volutpat at nulla ut posuere. Vivamus semper eros et mauris tempor, vel pretium mauris commodo. Sed luctus sem lacus, a feugiat massa tempus ac. Pellentesque tempus felis eu nisl condimentum, eget ornare mauris bibendum. Maecenas cursus dui id cursus gravida. Donec ante ex, vulputate a nunc vitae, sagittis ornare turpis. Donec viverra purus sed feugiat ornare. Duis id metus id quam rutrum laoreet eu at est.
    </p>
  </div>
  
  <img src="/assets/expenses-hero.svg" class="absolute -left-44 -translate-y-1/2 top-1/3 h-10/12" alt="">
</section>

<section class="p-8">
  <div class="p-4 border-2 border-lightgray rounded-lg">
    <ApexCharts 
      series={chartSeries} 
      options={chartOptions}
      height="700px"
    />
  </div>
</section>

<section class="text-blue-dark p-24 flex gap-8">
  <div>
    <h2 class="text-3xl font-bold">Services utilisés</h2>
    <p class="pt-8 text-xl">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pretium blandit consectetur. Fusce sed accumsan metus, vitae fringilla augue. Duis tristique ligula vitae ante lacinia porta. Aliquam volutpat at nulla ut posuere. Vivamus semper eros et mauris tempor, vel pretium mauris commodo. Sed luctus sem lacus, a feugiat massa tempus ac
    </p>

    <p class="pt-8 text-xl">
      Pellentesque tempus felis eu nisl condimentum, eget ornare mauris bibendum. Maecenas cursus dui id cursus gravida. Donec ante ex, vulputate a nunc vitae, sagittis ornare turpis. Donec viverra purus sed feugiat ornare. Duis id metus id quam rutrum laoreet eu at est.
    </p>
  </div>

  <img src="/assets/expenses-services.svg" alt="">
</section>
