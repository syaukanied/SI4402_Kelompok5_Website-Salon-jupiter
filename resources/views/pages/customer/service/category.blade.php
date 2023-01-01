@include('templates.header')
<style>
    .our-category {
        min-height: 100vh;
        position: relative;
    }

    .our-category .bg {
        opacity: 0.6;
        position: absolute;
        left: 0;
        top: 0;
        min-width: 100%;
        min-height: 100%;
        object-fit: cover;
    }

    .our-category .content {
        position: relative;
        padding-top: 150px;
    }

    .our-category .content {
        position: relative;
        padding-top: 150px;
    }

    .our-category .categories {
        margin: 0 auto;
        margin-top: 65px;
        width: 870px;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 60px;
    }

    .our-category .categories .category {
        text-align: center;
        font-weight: bold;
    }

    .our-category .categories .category .img {
        width: 250px;
        height: 350px;
        object-fit: cover;
        background-color: white;
    }

    .btn-back {
        position: absolute;
        top: 20px;
        left: 20px;
        z-index: 100;
    }

    .logo {
        position: absolute;
        bottom: 20px;
        right: 20px;
    }

    .our-category {
        height: 100vh;
    }

    .our-category .categories .category .price {
        font-size: 24px;
    }

    .our-category .categories .category .btn {
        background-color: #f5c793;
        width: 120px;
        position: absolute;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 1;
    }

    .our-category .categories .category .btn:hover {
        background-color: #f1af62;
    }

</style>
<div class="btn-back mt-4 ms-4">
    <a href="{{ url()->previous() }}">
        <img style="cursor: pointer;" src="{{ asset('/assets/images/back-button.png') }}">
    </a>
</div>

<!-- ourCategory-->
<section id="ourCategory" class="our-category">
    <img class="bg" src="/assets/images/signup.svg" alt="">
    <div class="content container">
        <h2 class="text-center">Silahkan Pilih Tipe Service Anda</h2>
        <article class="categories">
           @foreach ($service_categories as $service_category)
                <form action="{{route('service.category-logic')}}" method="post">
                    @csrf
                    <div class="category">
                        <input type="text" name="service_category_id" id="service_category_id" hidden readonly value="{{ $service_category->id }}" />
                        <p>{{$service_category->name}}</p>
                        <div class="bg-white position-relative">
                            <img class="img" src="
                                @if ($service_category->image != null)
                                    {{asset($service_category->image)}}
                                @else
                                    https://thumbs.dreamstime.com/b/bearded-man-male-portrait-stylish-beard-barber-scissors-straight-razor-shop-vintage-barbershop-shaving-219675564.jpg
                                @endif
                            ">
                            <button class="btn">Pilih</button>
                        </div>
                    </div>
                </form>
           @endforeach
        </article>
    </div>
</section>


@include('components.modal.book')
@include('templates.footer')
