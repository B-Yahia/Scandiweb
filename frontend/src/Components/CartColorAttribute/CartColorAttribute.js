import React from "react";
import { toKebabCase } from "../../Utils/functions";
import "./CartColorAttribute.css";

class CartColorAttribute extends React.Component {
  render() {
    const { attr, selectedAttr } = this.props;
    const index = selectedAttr.findIndex(
      (item) => item.attributeSet.id === attr.id
    );

    return (
      <div
        className="cart_attribute_container"
        data-testid={`cart-item-attribute-${toKebabCase(attr.name)}`}
      >
        <h2 className="cart_attribute_title">{attr.name}</h2>
        <div className="cart_attribute_items">
          {attr.items.map((item) => (
            <button
              className={
                item.id === selectedAttr[index].attribute.id
                  ? "cart_attribute_item selected"
                  : "cart_attribute_item"
              }
              key={item.id}
              style={{ backgroundColor: item.value }}
              data-testid={
                item.id === selectedAttr[index].attribute.id
                  ? `cart-item-attribute-${toKebabCase(
                      attr.name
                    )}-${toKebabCase(item.value)}-selected`
                  : `cart-item-attribute-${toKebabCase(
                      attr.name
                    )}-${toKebabCase(item.value)}`
              }
            ></button>
          ))}
        </div>
      </div>
    );
  }
}

export default CartColorAttribute;
