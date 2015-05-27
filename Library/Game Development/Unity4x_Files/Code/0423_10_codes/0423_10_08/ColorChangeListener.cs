// file: ColorChangeListener.cs
using UnityEngine;
using System.Collections;

public class ColorChangeListener : MonoBehaviour {
	void OnEnable() {
		ColorManager.onChangeColor += ChangeColorEvent;
	}
	
	private void OnDisable(){
		ColorManager.onChangeColor -= ChangeColorEvent;
	}

	void ChangeColorEvent(Color newColor){
		renderer.sharedMaterial.color = newColor;
	}
}
