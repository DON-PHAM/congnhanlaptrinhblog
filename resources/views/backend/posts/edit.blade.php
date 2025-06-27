@extends('layouts.master')
@section('contents')
<div class="container mt-4">
    <h2>Chỉnh sửa bài viết</h2>
    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <!-- Nav tabs -->
        <ul class="nav nav-tabs mb-3" id="postTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="content-tab" data-bs-toggle="tab" data-bs-target="#contents" type="button" role="tab">Nội dung</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seo" type="button" role="tab">SEO</button>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content" id="postTabsContent">
            <!-- Content Tab -->
            <div class="tab-pane fade show active" id="contents" role="tabpanel">
                <div class="mb-3">
                    <label for="title" class="form-label">Tiêu đề</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}" required>
                    @error('title')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label for="excerpt" class="form-label">Mô tả ngắn</label>
                    <textarea name="excerpt" id="excerpt" class="form-control">{{ old('excerpt', $post->excerpt) }}</textarea>
                    @error('excerpt')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Hình ảnh bài viết</label>
                    <input type="file" name="image" id="image" class="form-control">
                    <small class="form-text text-muted">Dung lượng tối đa: 3MB</small>
                    @if($post->image)
                        <div class="mt-2"><img src="{{ asset('storage/'.$post->image) }}" alt="Ảnh hiện tại" style="max-width:150px;"></div>
                    @endif
                    @error('image')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                <input type="hidden" name="slug" id="slug" value="{{ old('slug', $post->slug) }}">
                <div class="mb-3">
                    <label for="content" class="form-label">Nội dung</label>
                    <textarea name="content" id="content" class="form-control" rows="6" required>{{ old('content', $post->content) }}</textarea>
                    @error('content')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Danh mục</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        <option value="">-- Chọn danh mục --</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id', $post->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Trạng thái</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="public" {{ old('status', $post->status) == 'public' ? 'selected' : '' }}>Công khai</option>
                        <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Nháp</option>
                        <option value="trash" {{ old('status', $post->status) == 'trash' ? 'selected' : '' }}>Thùng rác</option>
                    </select>
                    @error('status')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $post->is_featured) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_featured">Bài viết nổi bật</label>
                </div>
                <div class="mb-3">
                    <label for="tags" class="form-label">Tag</label>
                    <select name="tags[]" id="tags" class="form-control" multiple>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" {{ (collect(old('tags', $post->tags->pluck('id')->toArray()))->contains($tag->id)) ? 'selected' : '' }}>{{ $tag->name }}</option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted">Giữ Ctrl (Windows) hoặc Command (Mac) để chọn nhiều tag</small>
                </div>
            </div>

            <!-- SEO Tab -->
            <div class="tab-pane fade" id="seo" role="tabpanel">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Meta Tags</h5>
                        <div class="mb-3">
                            <label for="meta_title" class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title" class="form-control" value="{{ old('meta_title', $post->meta_title) }}" maxlength="255">
                            <small class="form-text text-muted">Tối đa 255 ký tự</small>
                            @error('meta_title')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea name="meta_description" id="meta_description" class="form-control" rows="3" maxlength="500">{{ old('meta_description', $post->meta_description) }}</textarea>
                            <small class="form-text text-muted">Tối đa 500 ký tự</small>
                            @error('meta_description')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="meta_keywords" class="form-label">Meta Keywords</label>
                            <input type="text" name="meta_keywords" id="meta_keywords" class="form-control" value="{{ old('meta_keywords', $post->meta_keywords) }}" maxlength="255">
                            <small class="form-text text-muted">Từ khóa phân cách bằng dấu phẩy</small>
                            @error('meta_keywords')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5>Open Graph</h5>
                        <div class="mb-3">
                            <label for="og_title" class="form-label">OG Title</label>
                            <input type="text" name="og_title" id="og_title" class="form-control" value="{{ old('og_title', $post->og_title) }}" maxlength="255">
                            @error('og_title')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="og_description" class="form-label">OG Description</label>
                            <textarea name="og_description" id="og_description" class="form-control" rows="3" maxlength="500">{{ old('og_description', $post->og_description) }}</textarea>
                            @error('og_description')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="og_image" class="form-label">OG Image URL</label>
                            <input type="text" name="og_image" id="og_image" class="form-control" value="{{ old('og_image', $post->og_image) }}" maxlength="255">
                            @error('og_image')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h5>Twitter Card</h5>
                        <div class="mb-3">
                            <label for="twitter_title" class="form-label">Twitter Title</label>
                            <input type="text" name="twitter_title" id="twitter_title" class="form-control" value="{{ old('twitter_title', $post->twitter_title) }}" maxlength="255">
                            @error('twitter_title')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="twitter_description" class="form-label">Twitter Description</label>
                            <textarea name="twitter_description" id="twitter_description" class="form-control" rows="3" maxlength="500">{{ old('twitter_description', $post->twitter_description) }}</textarea>
                            @error('twitter_description')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="twitter_image" class="form-label">Twitter Image URL</label>
                            <input type="text" name="twitter_image" id="twitter_image" class="form-control" value="{{ old('twitter_image', $post->twitter_image) }}" maxlength="255">
                            @error('twitter_image')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@push('scripts')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    CKEDITOR.replace('content');
    CKEDITOR.replace('excerpt', {
        height: 150,
        toolbar: [
            ['Bold', 'Italic', 'Underline', 'Strike'],
            ['NumberedList', 'BulletedList'],
            ['Link', 'Unlink'],
            ['Source']
        ]
    });

    // Hàm chuyển đổi tiêu đề thành slug
    function convertToSlug(text) {
        return text
            .toLowerCase()
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .replace(/[đĐ]/g, 'd')
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .trim();
    }

    // Tự động tạo slug khi nhập tiêu đề
    document.getElementById('title').addEventListener('input', function() {
        const titleValue = this.value;
        const slugValue = convertToSlug(titleValue);
        document.getElementById('slug').value = slugValue;
        
        // Tự động điền meta title nếu chưa có
        if (!document.getElementById('meta_title').value) {
            document.getElementById('meta_title').value = titleValue;
        }
        
        // Tự động điền OG title nếu chưa có
        if (!document.getElementById('og_title').value) {
            document.getElementById('og_title').value = titleValue;
        }
        
        // Tự động điền Twitter title nếu chưa có
        if (!document.getElementById('twitter_title').value) {
            document.getElementById('twitter_title').value = titleValue;
        }
    });

    // Tự động điền meta description từ excerpt
    document.getElementById('excerpt').addEventListener('input', function() {
        const excerptValue = this.value;
        if (!document.getElementById('meta_description').value) {
            document.getElementById('meta_description').value = excerptValue;
        }
        if (!document.getElementById('og_description').value) {
            document.getElementById('og_description').value = excerptValue;
        }
        if (!document.getElementById('twitter_description').value) {
            document.getElementById('twitter_description').value = excerptValue;
        }
    });

    // Tự động điền OG Image URL và Twitter Image URL khi chọn ảnh
    document.getElementById('image').addEventListener('change', function(e) {
        if (this.files && this.files[0]) {
            // Lấy tên file
            const fileName = this.files[0].name;
            // Đường dẫn public dự kiến
            const imageUrl = window.location.origin + '/storage/posts/' + fileName;
            document.getElementById('og_image').value = imageUrl;
            document.getElementById('twitter_image').value = imageUrl;
        }
    });

    $(document).ready(function() {
        $('#tags').select2({
            placeholder: 'Chọn tag',
            allowClear: true,
            width: '100%'
        });
    });
</script>
@endpush 