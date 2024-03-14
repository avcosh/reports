<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

  <div class ="container">
 

<div class="section sec-services">
	<div class="container">
		<div class="row mb-5">
			<div class="col-lg-5 mx-auto text-center" data-aos="fade-up">
				<h2 class="heading text-primary">Отчеты от CRM-Мастерской «TSL»</h2>
				<p>Отчеты. Пакетное внедрение. Автоматизация процессов. Отраслевые решения </p>
			</div>
		</div>

		<div class="row">
			<div class="col-12 col-sm-4 col-md-4 col-lg-4" data-aos="fade-up">

				<div class="service text-center">
					<span class="bi-cash-coin"></span>
					<div>
						<h3>Отчет по сделкам менеджеров</h3>
						<p class="mb-4">  </p>
						<p><a href="<?= route_to('dailyreport.index') ?>" class="btn btn-outline-primary py-2 px-3">Перейти</a></p>
					</div>
				</div>

			</div>
			<div class="col-12 col-sm-4 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="100">
				<div class="service text-center">
					<span class="bi-chat-text"></span>
					<div>
						<h3>Отчет ФОТ (Фонд Оплаты Труда)</h3>
						<p class="mb-4"> </p>
						<p><a href="<?= route_to('fot.index') ?>" class="btn btn-outline-primary py-2 px-3">Перейти</a></p>
					</div>
				</div>
			</div>
			
			<div class="col-12 col-sm-4 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="100">
				<div class="service text-center">
					<span class="bi-chat-text"></span>
					<div>
						<h3>Отчет ФОТ <br>Супервайзеры</h3>
						<p class="mb-4"> </p>
						<p><a href="<?= route_to('fotsupervisor.index') ?>" class="btn btn-outline-primary py-2 px-3">Перейти</a></p>
					</div>
				</div>
			</div>
			
        </div>
		<hr>
		<div class="row">
		
		    <div class="col-12 col-sm-4 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="100">
				<div class="service text-center">
					<span class="bi-chat-text"></span>
					<div>
						<h3>Отчет Сделки по регионам</h3>
						<p class="mb-4"> </p>
						<p><a href="<?= route_to('dealsregion.index') ?>" class="btn btn-outline-primary py-2 px-3">Перейти</a></p>
					</div>
				</div>
			</div>
			
			<div class="col-12 col-sm-4 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="100">
				<div class="service text-center">
					<span class="bi-chat-text"></span>
					<div>
						<h3>Отчет Возвраты по регионам</h3>
						<p class="mb-4"> </p>
						<p><a href="<?= route_to('refundregion.index') ?>" class="btn btn-outline-primary py-2 px-3">Перейти</a></p>
					</div>
				</div>
			</div>
			
			<div class="col-12 col-sm-4 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="100">
				<div class="service text-center">
					<span class="bi-chat-text"></span>
					<div>
						<h3>Отчет Возвраты по менеджерам</h3>
						<p class="mb-4"> </p>
						<p><a href="<?= route_to('refundmanager.index') ?>" class="btn btn-outline-primary py-2 px-3">Перейти</a></p>
					</div>
				</div>
			</div>
		
		</div>
		<hr>
		<div class="row">
		
		    <div class="col-12 col-sm-4 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="100">
				<div class="service text-center">
					<span class="bi-chat-text"></span>
					<div>
						<h3>Отчет вывод фактически отработанных смен</h3>
						<p class="mb-4"> </p>
						<p><a href="<?= route_to('workedshifts.index') ?>" class="btn btn-outline-primary py-2 px-3">Перейти</a></p>
					</div>
				</div>
			</div>
			
			
		</div>
		
	</div>
</div>

</div>
<?= $this->endSection() ?>

