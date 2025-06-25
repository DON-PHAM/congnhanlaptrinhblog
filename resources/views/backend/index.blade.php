@extends('layouts.master')

@section('contents')
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
      <!--begin::Container-->
      <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
          <div class="col-sm-6"><h3 class="mb-0">Dashboard</h3></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>
        </div>
        <!--end::Row-->
      </div>
      <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
      <!--begin::Container-->
      <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
          <!--begin::Col-->
          <div class="col-lg-3 col-6">
            <!--begin::Small Box Widget 1-->
            <div class="small-box text-bg-primary">
              <div class="inner">
                <h3>{{ $postCount }}</h3>
                <p>Tổng bài viết</p>
              </div>
              <svg
                class="small-box-icon"
                fill="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true"
              >
                <path
                  d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z"
                ></path>
              </svg>
              <a
                href="{{ route('posts.index') }}"
                class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
              >
                Xem chi tiết <i class="bi bi-link-45deg"></i>
              </a>
            </div>
            <!--end::Small Box Widget 1-->
          </div>
          <!--end::Col-->
          <div class="col-lg-3 col-6">
            <!--begin::Small Box Widget 2-->
            <div class="small-box text-bg-success">
              <div class="inner">
                <h3>{{ $categoryCount }}</h3>
                <p>Tổng danh mục</p>
              </div>
              <svg
                class="small-box-icon"
                fill="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true"
              >
                <path
                  d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z"
                ></path>
              </svg>
              <a
                href="{{ route('categories.index') }}"
                class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
              >
                Xem chi tiết <i class="bi bi-link-45deg"></i>
              </a>
            </div>
            <!--end::Small Box Widget 2-->
          </div>
          <!--end::Col-->
          <div class="col-lg-3 col-6">
            <!--begin::Small Box Widget 3-->
            <div class="small-box text-bg-warning">
              <div class="inner">
                <h3>{{ $userCount }}</h3>
                <p>Tổng người dùng</p>
              </div>
              <svg
                class="small-box-icon"
                fill="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true"
              >
                <path
                  d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"
                ></path>
              </svg>
              <a
                href="{{ route('users.index') }}"
                class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover"
              >
                Xem chi tiết <i class="bi bi-link-45deg"></i>
              </a>
            </div>
            <!--end::Small Box Widget 3-->
          </div>
          <!--end::Col-->
          <div class="col-lg-3 col-6">
            <!--begin::Small Box Widget 4-->
            <div class="small-box text-bg-danger">
              <div class="inner">
                <h3>{{ $commentCount }}</h3>
                <p>Tổng bình luận</p>
              </div>
              <svg
                class="small-box-icon"
                fill="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true"
              >
                <path
                  clip-rule="evenodd"
                  fill-rule="evenodd"
                  d="M2.25 13.5a8.25 8.25 0 018.25-8.25.75.75 0 01.75.75v6.75H18a.75.75 0 01.75.75 8.25 8.25 0 01-16.5 0z"
                ></path>
                <path
                  clip-rule="evenodd"
                  fill-rule="evenodd"
                  d="M12.75 3a.75.75 0 01.75-.75 8.25 8.25 0 018.25 8.25.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75V3z"
                ></path>
              </svg>
              <a
                href="{{ route('comments.index') }}"
                class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
              >
                Xem chi tiết <i class="bi bi-link-45deg"></i>
              </a>
            </div>
            <!--end::Small Box Widget 4-->
          </div>
          <!--end::Col-->
        </div>
        <!--end::Row-->
        
        <!--begin::Row-->
        <div class="row">
          <!-- Start col -->
          <div class="col-lg-8 connectedSortable">
            <!-- Biểu đồ tròn tổng quan -->
            <div class="card mb-4">
              <div class="card-header">
                <h3 class="card-title">Tổng quan hệ thống</h3>
              </div>
              <div class="card-body">
                <canvas id="overviewChart" width="400" height="200"></canvas>
              </div>
            </div>
            
            <!-- Thống kê chi tiết -->
            <div class="row">
              <div class="col-md-6">
                <div class="card mb-4">
                  <div class="card-header">
                    <h3 class="card-title">Thống kê bài viết</h3>
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                      <span>Bài viết công khai:</span>
                      <span class="badge bg-success">{{ $publicPosts }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                      <span>Bài viết nháp:</span>
                      <span class="badge bg-warning">{{ $draftPosts }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                      <span>Bài viết nổi bật:</span>
                      <span class="badge bg-primary">{{ $featuredPosts }}</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card mb-4">
                  <div class="card-header">
                    <h3 class="card-title">Thống kê người dùng</h3>
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                      <span>Supper Admin:</span>
                      <span class="badge bg-danger">{{ $supperAdminUsers }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                      <span>Admin:</span>
                      <span class="badge bg-warning">{{ $adminUsers }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                      <span>User thường:</span>
                      <span class="badge bg-info">{{ $normalUsers }}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Start col -->
          <div class="col-lg-4 connectedSortable">
            <!-- Biểu đồ tròn chi tiết -->
            <div class="card mb-4">
              <div class="card-header">
                <h3 class="card-title">Phân bố dữ liệu</h3>
              </div>
              <div class="card-body">
                <canvas id="detailChart" width="300" height="300"></canvas>
              </div>
            </div>
            
            <!-- Thống kê nhanh -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Thống kê nhanh</h3>
              </div>
              <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                  <span>Tổng thẻ (Tag):</span>
                  <span class="badge bg-secondary">{{ $tagCount }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                  <span>Tổng bình luận:</span>
                  <span class="badge bg-danger">{{ $commentCount }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                  <span>Tổng danh mục:</span>
                  <span class="badge bg-success">{{ $categoryCount }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                  <span>Tổng bài viết:</span>
                  <span class="badge bg-primary">{{ $postCount }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--end::Row-->
      </div>
      <!--end::Container-->
    </div>
    <!--end::App Content-->
  </main>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Biểu đồ tròn tổng quan
const overviewCtx = document.getElementById('overviewChart').getContext('2d');
const overviewChart = new Chart(overviewCtx, {
    type: 'doughnut',
    data: {
        labels: ['Bài viết', 'Danh mục', 'Bình luận', 'Người dùng', 'Thẻ'],
        datasets: [{
            data: [
                {{ $chartData['posts'] }},
                {{ $chartData['categories'] }},
                {{ $chartData['comments'] }},
                {{ $chartData['users'] }},
                {{ $chartData['tags'] }}
            ],
            backgroundColor: [
                '#007bff',
                '#28a745', 
                '#ffc107',
                '#dc3545',
                '#6c757d'
            ],
            borderWidth: 2,
            borderColor: '#fff'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom'
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        const label = context.label || '';
                        const value = context.parsed;
                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                        const percentage = ((value / total) * 100).toFixed(1);
                        return `${label}: ${value} (${percentage}%)`;
                    }
                }
            }
        }
    }
});

// Biểu đồ tròn chi tiết
const detailCtx = document.getElementById('detailChart').getContext('2d');
const detailChart = new Chart(detailCtx, {
    type: 'pie',
    data: {
        labels: ['Bài viết', 'Danh mục', 'Bình luận', 'Người dùng', 'Thẻ'],
        datasets: [{
            data: [
                {{ $chartData['posts'] }},
                {{ $chartData['categories'] }},
                {{ $chartData['comments'] }},
                {{ $chartData['users'] }},
                {{ $chartData['tags'] }}
            ],
            backgroundColor: [
                '#007bff',
                '#28a745',
                '#ffc107', 
                '#dc3545',
                '#6c757d'
            ],
            borderWidth: 3,
            borderColor: '#fff'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    padding: 20,
                    usePointStyle: true
                }
            }
        }
    }
});
</script>
@endpush