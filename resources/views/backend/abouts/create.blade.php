@extends('layouts.master')
@section('contents')
<div class="container mt-4" style="max-width: 700px;">
    <h2>Thêm thông tin cá nhân</h2>
    <form action="{{ route('abouts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Họ tên <span class="text-danger">*</span></label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Chức danh/Nghề nghiệp</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
            @error('title')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="avatar" class="form-label">Ảnh đại diện</label>
            <input type="file" name="avatar" id="avatar" class="form-control">
            @error('avatar')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                @error('email')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="phone" class="form-label">Điện thoại</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
                @error('phone')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">
            @error('address')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="birthday" class="form-label">Ngày sinh</label>
            <input type="date" name="birthday" id="birthday" class="form-control" value="{{ old('birthday') }}">
            @error('birthday')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="summary" class="form-label">Giới thiệu ngắn</label>
            <textarea name="summary" id="summary" class="form-control" rows="3">{{ old('summary') }}</textarea>
            @error('summary')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="skills" class="form-label">Kỹ năng (mỗi dòng 1 kỹ năng)</label>
            <textarea name="skills" id="skills" class="form-control" rows="3">{{ old('skills') }}</textarea>
            @error('skills')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="experience" class="form-label">Kinh nghiệm (mỗi dòng 1 kinh nghiệm)</label>
            <textarea name="experience" id="experience" class="form-control" rows="3">{{ old('experience') }}</textarea>
            @error('experience')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="education" class="form-label">Học vấn (mỗi dòng 1 mục)</label>
            <textarea name="education" id="education" class="form-control" rows="3">{{ old('education') }}</textarea>
            @error('education')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Mạng xã hội (Facebook, LinkedIn, ...)</label>
            <div id="social-links-list">
                @php $socials = old('social_links', []); @endphp
                @for($i = 0; $i < max(1, count($socials)); $i++)
                    <div class="row mb-2">
                        <div class="col-md-5">
                            <input type="text" name="social_links[{{ $i }}][name]" class="form-control" placeholder="Tên mạng xã hội" value="{{ $socials[$i]['name'] ?? '' }}">
                        </div>
                        <div class="col-md-7">
                            <input type="text" name="social_links[{{ $i }}][url]" class="form-control" placeholder="URL" value="{{ $socials[$i]['url'] ?? '' }}">
                        </div>
                    </div>
                @endfor
            </div>
            <button type="button" class="btn btn-sm btn-secondary" onclick="addSocialLink()">Thêm mạng xã hội</button>
            @error('social_links')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="{{ route('abouts.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
@push('scripts')
<script>
function addSocialLink() {
    const list = document.getElementById('social-links-list');
    const idx = list.children.length;
    const row = document.createElement('div');
    row.className = 'row mb-2';
    row.innerHTML = `<div class="col-md-5"><input type="text" name="social_links[${idx}][name]" class="form-control" placeholder="Tên mạng xã hội"></div><div class="col-md-7"><input type="text" name="social_links[${idx}][url]" class="form-control" placeholder="URL"></div>`;
    list.appendChild(row);
}
</script>
@endpush 