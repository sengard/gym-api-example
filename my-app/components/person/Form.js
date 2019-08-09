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
                   id={`person_${data.input.name}`}
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
        <Field component={this.renderField} name="familyName" type="text"
          placeholder="Family name. In the U.S., the last name of an Person. This can be used along with givenName instead of the name property." />
        <Field component={this.renderField} name="givenName" type="text"
          placeholder="Given name. In the U.S., the first name of a Person. This can be used along with familyName instead of the name property." />
        <Field component={this.renderField} name="birthDate" type="dateTime"
          placeholder="date of birth" />
        <Field component={this.renderField} name="follows" type="text"
          placeholder="" />
        <Field component={this.renderField} name="gender" type="text"
          placeholder="Gender of the person. While http://schema.org/Male and http://schema.org/Female may be used, text strings are also acceptable for people who do not identify as a binary gender." />
        <Field component={this.renderField} name="knowsLanguage" type="text"
          placeholder="Of a [Person](http://schema.org/Person), and less typically of an [Organization](http://schema.org/Organization), to indicate a known language. We do not distinguish skill levels or reading/writing/speaking/signing here. Use language codes from the [IETF BCP 47 standard](http://tools.ietf.org/html/bcp47)." />
        <Field component={this.renderField} name="nationality" type="text"
          placeholder="nationality of the person" />
        <Field component={this.renderField} name="weight" type="text"
          placeholder="the weight of the product or person" />
        <Field component={this.renderField} name="height" type="text"
          placeholder="the height of the item" />
        <Field component={this.renderField} name="unitsOfMeasurement" type="checkbox"
          placeholder="" />
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
      form: 'person',
      enableReinitialize: true, keepDirtyOnReinitialize: true,
    })(
    Form);
