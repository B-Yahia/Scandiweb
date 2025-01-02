import React from "react";
import { connect } from "react-redux";
import { AddAttribute } from "../../../ReduxStore/AttributesSlice";
import "./TextAttribute.css";
import { toKebabCase } from "../../../Utils/functions";

class TextAttribute extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      selectedAttrOptionId: "",
    };
  }

  componentDidMount() {
    this.updateSelectedAttribute();
  }

  componentDidUpdate(prevProps) {
    if (
      prevProps.ListOfSelectedAttributes !==
        this.props.ListOfSelectedAttributes ||
      prevProps.selectedAttr !== this.props.selectedAttr
    ) {
      this.updateSelectedAttribute();
    }
  }

  updateSelectedAttribute = () => {
    const { ListOfSelectedAttributes, attr, selectedAttr } = this.props;
    const index = ListOfSelectedAttributes.findIndex(
      (item) => item.attributeSet.id === attr.id
    );

    if (index === -1) {
      this.setState({ selectedAttrOptionId: NaN });
    } else {
      this.setState({ selectedAttrOptionId: selectedAttr[index].attribute.id });
    }
  };

  addSelection = (attributeSet, attribute) => {
    const data = {
      attributeSet: attributeSet,
      attribute: attribute,
    };
    this.props.dispatch(AddAttribute(data));
  };

  render() {
    const { attr } = this.props;
    const { selectedAttrOptionId } = this.state;
    return (
      <div
        className="attribute_container"
        data-testid={`product-attribute-${toKebabCase(attr.name)}`}
      >
        <h2>{attr.name}</h2>
        <div className="attribute_items">
          {attr.items.map((item) => (
            <button
              onClick={() => this.addSelection(attr, item)}
              className={
                item.id === selectedAttrOptionId
                  ? "selected_attribute_item_text"
                  : "attribute_item_text"
              }
              key={item.id}
              data-testid={`product-attribute-${toKebabCase(attr.name)}-${
                item.value
              }`}
            >
              {item.value}
            </button>
          ))}
        </div>
      </div>
    );
  }
}

const mapStateToProps = (state) => ({
  ListOfSelectedAttributes: state.attributes.list,
});

export default connect(mapStateToProps)(TextAttribute);
