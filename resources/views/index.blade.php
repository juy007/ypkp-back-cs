@include('layout/header')
<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">

		<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
			<div class="col">
				<div class="card radius-10 overflow-hidden bg-danger">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<p class="mb-0 text-white">Total Customer Services</p>
								<h5 class="mb-0 text-white">
									{{ count(DB::table('user')->where('level', 'cs')->get())  }}
								</h5>
							</div>
							<div class="ms-auto text-white">	<i class='bx bx-user-voice font-30'></i>
							</div>
						</div>
					</div>
					<div class="" id="chart1"></div>
				</div>
			</div>
			<div class="col">
				<div class="card radius-10 overflow-hidden bg-primary">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<p class="mb-0 text-white">Total Gelombang</p>
								<h5 class="mb-0 text-white">
									{{ count(DB::table('gelombang')->get())  }}
								</h5>
							</div>
							<div class="ms-auto text-white">	<i class='bx bx-window-open font-30'></i>
							</div>
						</div>
					</div>
					<div class="" id="chart2"></div>
				</div>
			</div>
			<div class="col">
				<div class="card radius-10 overflow-hidden bg-warning">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<p class="mb-0 text-dark">Total Jurusan</p>
								<h5 class="mb-0 text-dark">
									{{ count(DB::table('jurusan')->get())  }}
								</h5>
							</div>
							<div class="ms-auto text-dark">	<i class='bx bx-layer font-30'></i>
							</div>
						</div>
					</div>
					<div class="" id="chart3"></div>
				</div>
			</div>
			<div class="col">
				<div class="card radius-10 overflow-hidden bg-success">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<p class="mb-0 text-white">Total Pendaftar</p>
								<h5 class="mb-0 text-white">
									{{ count(DB::table('pendaftar')->get())  }}
								</h5>
							</div>
							<div class="ms-auto text-white">	<i class='bx bx-user-pin font-30'></i>
							</div>
						</div>
					</div>
					<div class="" id="chart4"></div>
				</div>
			</div>
		</div><!--end row-->
		<br><br><br>
		<h2 class="text-center">Hai {{ session()->get('namaCs') }}<br>Selamat Datang di Halaman Customer Services</h2>

	</div>
</div>
<!--end page wrapper -->
@include('layout/footer')	