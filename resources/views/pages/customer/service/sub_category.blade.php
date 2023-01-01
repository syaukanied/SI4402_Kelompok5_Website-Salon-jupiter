@include('templates.header')
<style>
    .btn-back {
        position: absolute;
        top: 20px;
        left: 20px;
        z-index: 100;
    }

    .sub-category {
        min-height: 90vh;
        position: relative;
    }

    .sub-category .bg {
        position: absolute;
        left: 0;
        top: 0;
        min-width: 100%;
        min-height: 100%;
        filter: grayscale(100%);
    }

    .sub-category .content {
        position: relative;
        padding-top: 100px;
    }

    .sub-category .items {
        margin: 0 auto;
        margin-top: 60px;
        width: 650px;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 100px;
    }

    .sub-category .items .item {
        width: 150px;
        height: 150px;
        background-color: white;
        text-align: center;
        font-weight: bold;
    }

    .sub-category .items .item .img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        margin-bottom: 10px;
    }

    .sub-category .items .item p {
        background: #F4926B;
        border-radius: 15px;
        padding: 2px 4px;
        color: black;
    }

    .sub-category .items .item .img:hover {
        box-shadow: 0px 0px 10px #00000077
    }

</style>
<div class="btn-back mt-4 ms-4">
    <a href="{{ url()->previous() }}">
        <img style="cursor: pointer;" src="{{ asset('/assets/images/back-button.png') }}">
    </a>
</div>

<section id="subCategory" class="sub-category">
    <img class="bg" src="/assets/images/signup.svg" alt="">
    <div class="content container">
        <article class="items">
            @foreach ($service_sub_categories as $service_sub_category)
                <div class="item">
                    <form id="serviceForm{{ $service_sub_category->id }}" action="{{ route('service.subcategory-logic') }}" method="POST">
                        @csrf
                        <input type="text" name="service_sub_category_id" id="service_sub_category_id" hidden readonly value="{{ $service_sub_category->id }}" />
                        <img style="cursor: pointer" width="150px" height="150px" class="img" src="{{ asset($service_sub_category->image) }}" alt="" srcset="" onclick="document.getElementById('serviceForm{{ $service_sub_category->id }}').submit()">
                        <p>{{ $service_sub_category->name }} </p>
                    </form>
                </div>
            @endforeach
        </article>
    </div>
</section>


@include('components.modal.book')
@include('templates.footer')
