<!-- Contact Section -->
<section id="contact">
    <div class="container">
        <div class="row justify-content-around align-items-center gy-5">
            <div class="col-sm-12 col-lg-7 me-lg-5">
                <h2 class="mb-5">Hello,<br />Let's get in touch.</h2>
                <form action="./includes/send_mail.php" method="post">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control mb-5" id="name" aria-describedby="name" placeholder="e.g. Joe Crimson" />
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control mb-5" id="email" name="email" aria-describedby="email" placeholder="e.g. email@example.com" />
                    <label for="name" class="form-label">Message</label>
                    <textarea class="form-control mb-5" id="text-area" rows="6" name="message" placeholder="Write your message here..."></textarea>
                    <button type="submit" class="btn btn-outline-primary px-5">
                        Send
                    </button>
                </form>
            </div>
            <div class="col-sm-12 col-lg-2 h-100">
                <div class="row gy-5">
                    <div class="col">
                        <h6 class="mb-4">Opening Hours</h6>
                        <h5 style="white-space: nowrap" class="mb-3">
                            Monday - Saturday<br />7pm - 10pm
                        </h5>
                        <h5 class="mt-2">Sunday<br />5pm - 8pm</h5>
                    </div>

                    <div class="col">
                        <h6 class="mb-4">Location</h6>
                        <h5 style="white-space: nowrap">
                            Dinarobin Beachcomber, <br />
                            Le Morne, <br />
                            Mauritius
                        </h5>
                    </div>

                    <div class="col">
                        <h6 class="mb-4">Support</h6>
                        <h5>dinas@restaurant.mu</h5>
                        <h5 style="white-space: nowrap">+230 407-9000</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>