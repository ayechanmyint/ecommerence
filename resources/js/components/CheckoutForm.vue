<template>
  <form class="col-1 border mt-3" :action="action_url" method="POST">
    <div class="form-group mt-3">
      <label for="coupon">Coupon Code</label>
      <input
        name="coupon_code"
        type="text"
        class="form-control"
        id="coupon"
        aria-describedby="couponHelp"
        @blur="checkCoupon"
        v-model="couponCode"
      />
      
      <small
        v-if="isValidCoupon"
        id="couponHelp"
        class="form-text text-muted"
      >Your coupon code is accepted!!</small>
    </div>
    <div class="mb-3">
      Total :
      <span class="font-weight-bold text-success">{{ total_price }} USD</span>
    </div>
    <slot></slot>
    <button type="submit" class="btn btn-primary">Checkout</button>
  </form>
</template>
<script>
export default {
  props: ["total_price", "action_url"],
  data() {
    return {
      couponCode: null,
      isValidCoupon : false
    };
  },
  methods: {
    checkCoupon() {
      //   console.log(`Checking coupon from here with ${this.couponCode}`);

      axios
      .get(`/api/v1/coupon-code/${this.couponCode}`)
      .then(data => {
        if(data.data){
            this.isValidCoupon = true;
        }
      });
    }
  }
};
</script>