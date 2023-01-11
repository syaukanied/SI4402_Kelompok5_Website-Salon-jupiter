@include('templates.header')
<style>
    .our-category {
        min-height: 100vh;
        position: relative;
    }

    .bg {
        opacity: 0.3;
        position: absolute;
        left: 0;
        top: 0;
        min-width: 100%;
        min-height: 100%;
        /* object-fit: cover; */
    }

    .our-category .content {
        position: relative;
        margin-top: 110px;
        padding-bottom: 70px;
        /* padding-top: 150px; */
        background-color:rgba(192, 174, 170, 0.8);
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
@include('templates.navbar')
<br><br><br><br>
<!-- <div class="btn-back mt-4 ms-4">
<br><br><br>
    <a href="{{ url('service') }}">
        <img style="cursor: pointer;" src="{{ asset('/assets/images/back-button2.png') }}">
    </a>
</div> -->
<img class="bg" src="/assets/images/bgtest2.jpeg" alt="">

<!-- ourCategory-->
<section id="ourCategory" class="our-category">
    <div class="content container rounded-3">
        <br><br>
        <h2 class="text-center" style="color:white;font-family: 'Trebuchet MS', sans-serif;">Choose Your Service Type</h2>
        <article class="categories">
           @foreach ($service_categories as $service_category)
                <form action="{{route('service.category-logic')}}" method="post">
                    @csrf
                    <div class="category">
                        <input type="text" name="service_category_id" id="service_category_id" hidden readonly value="{{ $service_category->id }}" />
                        <p style="color:white; font-family: 'Trebuchet MS', sans-serif;">{{$service_category->name}}</p>
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
