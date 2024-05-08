<section class="footer">
    <footer class="bg-body-tertiary">
        <div class="bg-dark">
            <div class="container p-4">
                {{-- Logo --}}
                <img class="footer-img" src="{{ asset('images/logo.png') }}" alt="" />

                {{-- Info --}}
                <div class="row">
                    <div class="left-footer">
                        <ul class="list-unstyled mb-0">
                            <li>
                                <p>Copyright © AnimeHaven</p>
                            </li>
                            <li>
                                <p>
                                    Vytvorenie a dizajn stránky - Mário Babiar, Peter Brandajský
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 mb-4 mb-md-0">
                        <ul class="list-unstyled">
                            <li>
                                <p>Tel. kontakt: 0910 638 409, 0902 203 124</p>
                            </li>
                            <li>
                                <p>Mail: xbabiar@stuba.sk, xbrandajsky@stuba.sk</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</section>

{{-- Script for defining routes --}}
<script type="text/javascript">
    window.routes = {
        search: '{{ route('search') }}',
        productShowPattern: '{{ route('product.show', ['product_id' => ':id']) }}'
    };
</script>
