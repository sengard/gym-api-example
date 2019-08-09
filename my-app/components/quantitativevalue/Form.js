import React, { Component } from 'react';
import { Field, reduxForm } from 'redux-form';
import { View } from 'react-native';
import {
  FormLabel,
  FormInput,
  FormValidationMessage,
  Button,
} from 'react-native-elements';


class Form extends Component {

  renderField(data) {
    const hasError = data.meta.touched && !!data.meta.error;
    data.input.value = data.input.value.toString();
    return (
      <View>
        <FormLabel labelStyle={ {color: 'gray', fontSize: 20} }>
            {data.input.name}
        </FormLabel>
        <FormInput containerStyle={ {flexDirection:'row'} }
                   inputStyle={ {color: 'black', flex:1} }
                   {...data.input}
                   step={data.step}
                   required={data.required}
                   placeholder={data.placeholder}
                   id={`quantitativevalue_${data.input.name}`}
                   multiline={true}
                   keyboardType='numeric'
        />
        {hasError &&
          <FormValidationMessage>{data.meta.error}</FormValidationMessage> }
      </View>
    );
  }

  render() {
    const {handleSubmit, mySubmit} = this.props;

    return (
      <View style={ {backgroundColor: 'white', paddingBottom: 20} }>
        <Field component={this.renderField} name="id" type="text"
          placeholder="" />
        <Field component={this.renderField} name="value" type="number"
          placeholder="The value of the quantitative value or property value node.

- For [QuantitativeValue](http://schema.org/QuantitativeValue) and [MonetaryAmount](http://schema.org/MonetaryAmount), the recommended type for values is 'Number'.
- For [PropertyValue](http://schema.org/PropertyValue), it can be 'Text;', 'Number', 'Boolean', or 'StructuredValue'.
- Use values from 0123456789 (Unicode 'DIGIT ZERO' (U+0030) to 'DIGIT NINE' (U+0039)) rather than superficially similiar Unicode symbols.
- Use '.' (Unicode 'FULL STOP' (U+002E)) rather than ',' to indicate a decimal point. Avoid using these symbols as a readability separator." />
        <Field component={this.renderField} name="unitCode" type="text"
          placeholder="The unit of measurement given using the UN/CEFACT Common Code (3 characters) or a URL. Other codes than the UN/CEFACT Common Code may be used with a prefix followed by a colon." />
        <Field component={this.renderField} name="createdAt" type="dateTime"
          placeholder="" />
        <Field component={this.renderField} name="updatedAt" type="dateTime"
          placeholder="" />
        <Button buttonStyle={styles.button}
          title='SAVE'
          onPress={handleSubmit(mySubmit)}
        />
      </View>
    );
  }
}

const styles = {
  button: {
    flex: 1,
    backgroundColor: '#3faab4',
    borderRadius: 5,
    borderWidth: 0,
    borderColor: 'transparent',
    width: 300,
    height: 50,
    margin: 20,
  },
  placeholderStyle:{
    paddingRight:10
  }
};

export default reduxForm(
    {
      form: 'quantitativevalue',
      enableReinitialize: true, keepDirtyOnReinitialize: true,
    })(
    Form);
