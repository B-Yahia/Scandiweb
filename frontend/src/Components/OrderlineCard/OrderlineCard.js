import React from "react";
import { connect } from "react-redux";
import CartTextAttribute from "../CartTextAttribute/CartTextAttribute";
import CartColorAttribute from "../CartColorAttribute/CartColorAttribute";
import { decreaseUnits, increaseUnits } from "../../ReduxStore/CartSlice";

class OrderlineCard extends React.Component {
  increaseQty = (id) => {
    this.props.dispatch(increaseUnits(id));
  };

  decreaseQty = (id) => {
    this.props.dispatch(decreaseUnits(id));
  };

  render() {
    const { orderLine } = this.props;
    return (
      <div className="orderLine_card">
        <div className="orederline_info">
          <p className="orederline_info_name">{orderLine.product.name}</p>
          <p className="orederline_info_price">
            {orderLine.product.prices[0].amount} -
            {orderLine.product.prices[0].currency.symbol}
          </p>
          {orderLine.product.attributes.map((attr, index) =>
            attr.type === "text" ? (
              <CartTextAttribute
                attr={attr}
                selectedAttr={orderLine.selectedAttributes}
                key={index}
              />
            ) : (
              <CartColorAttribute
                attr={attr}
                selectedAttr={orderLine.selectedAttributes}
                key={index}
              />
            )
          )}
        </div>
        <div className="orederline_btns">
          <button
            className="orederline_btn"
            onClick={() => this.increaseQty(orderLine.id)}
            data-testid="cart-item-amount-increase"
          >
            +
          </button>
          <p data-testid="cart-item-amount">{orderLine.units}</p>
          <button
            className="orederline_btn"
            onClick={() => this.decreaseQty(orderLine.id)}
            data-testid="cart-item-amount-decrease"
          >
            -
          </button>
        </div>
        <div className="orederline_img">
          <img
            className="orederline_img"
            src={orderLine.product.gallery[0]}
            alt=""
          />
        </div>
      </div>
    );
  }
}

const mapDispatchToProps = (dispatch) => ({ dispatch });
export default connect(null, mapDispatchToProps)(OrderlineCard);
