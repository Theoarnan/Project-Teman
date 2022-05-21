<ul class="nav">
  <li class="nav-item nav-profile">
    <div class="nav-link">
      <div class="user-wrapper">
        <div class="profile-image">
          @if(Auth::user()->gambar == '')
          <img src="{{asset('images/user/usersss.png')}}" alt="profile image">
          @else
          <img src="{{asset('images/user/'. Auth::user()->gambar)}}" height="125" width="125" alt="profile image">
          @endif
        </div>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link">
      <div class="text">
        <p class="profile-name">{{Auth::user()->name}}</p>
        <div>
          <small class="designation text-muted" style="text-transform: uppercase;letter-spacing: 1px;">{{ Auth::user()->level }}</small>
          <span class="status-indicator online"></span>
        </div>
      </div>
    </a>
  </li>
  <li class="nav-item {{ setActive(['/', 'home']) }}">
    <a class="nav-link" href="{{url('/')}}">
      <i class="menu-icon mdi mdi-home"></i>
      <span class="menu-title">Dashboard</span>
    </a>
  </li>
  @if(Auth::user()->level == 'admin')
  <li class="nav-item {{ setActive(['mahasiswa*', 'buku*', 'user*']) }}">
    <a class="nav-link " data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
      <i class="menu-icon mdi mdi-folder-multiple"></i>
      <span class="menu-title">Master Data</span>
      <i class="menu-arrow"></i>
    </a>
    <div class="collapse {{ setShow(['mahasiswa*', 'buku*', 'user*']) }}" id="ui-basic">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item">
          <a class="nav-link {{ setActive(['mahasiswa*']) }}" href="{{route('mahasiswa.index')}}">
            <i class="menu-icon mdi mdi-human-male-female"></i>Data Mahasiswa
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ setActive(['dosen*']) }}" href="{{route('dosen.index')}}">
            <i class="menu-icon mdi mdi-human-male-female"></i>Data Dosen
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ setActive(['kategori*']) }}" href="{{route('kategori.index')}}">
            <i class="menu-icon mdi mdi-book-multiple"></i>Kategori Buku
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ setActive(['buku*']) }}" href="{{route('buku.index')}}">
            <i class="menu-icon mdi mdi-book-open-page-variant"></i>Data Buku
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ setActive(['user*']) }}" href="{{route('user.index')}}">
            <i class="menu-icon mdi mdi-account-circle"></i>Data User
          </a>
        </li>
      </ul>
    </div>
  </li>
  <li class="nav-item {{ Request::is('transaksi/create') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('transaksi.create') }}">
      <i class="menu-icon mdi mdi-laptop-mac"></i>
      <span class="menu-title">App Transaksi</span>
    </a>
  </li>
  <li class="nav-item {{ Request::is('transaksi') ? 'active' : '' }}">
    <a class="nav-link" href="{{route('transaksi.index')}}">
      <i class="menu-icon mdi mdi-file-document"></i>
      <span class="menu-title">Transaksi Pinjam</span>
    </a>
  </li>
  <li class="nav-item {{ Request::is('transaksi-kembali') ? 'active' : '' }}">
    <a class="nav-link" href="{{route('transaksi.kembali')}}">
      <i class="menu-icon mdi mdi-clipboard-check"></i>
      <span class="menu-title">Transaksi Kembali</span>
    </a>
  </li>
  <li class="nav-item {{ Request::is('laporan/trs') ? 'active' : '' }}">
    <a class="nav-link" href="{{url('laporan/trs')}}">
      <i class="menu-icon mdi mdi-printer"></i>
      <span class="menu-title">Laporan</span>
    </a>
  </li>
  @endif
</ul>