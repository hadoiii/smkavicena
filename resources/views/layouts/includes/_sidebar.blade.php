<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="/dashboard" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						
						<!-- MENU YANG BISA DILIHAT ADMIN -->
						@if(auth()->user()->role == 'admin')
						<li><a href="/siswa" class=""><i class="lnr lnr-graduation-hat"></i> <span>Siswa</span></a></li>
						<li><a href="/guru" class=""><i class="lnr lnr-user"></i> <span>Guru</span></a></li>
						<li><a href="/mapel" class=""><i class="lnr lnr-book"></i> <span>Mata Pelajaran</span></a></li>
						@endif

						<!-- MENU YANG BISA DILIHAT SISWA -->
						@if(auth()->user()->role == 'siswa')
						<li><a href="/mapel" class=""><i class="lnr lnr-book"></i> <span>Mata Pelajaran</span></a></li>
						</ul>
						@endif

						<!-- MENU YANG BISA DILIHAT GURU -->
						@if(auth()->user()->role == 'guru')
						<li><a href="/mapel" class=""><i class="lnr lnr-book"></i> <span>Mata Pelajaran</span></a></li>
						</ul>
						@endif
				</nav>
			</div>
		</div>