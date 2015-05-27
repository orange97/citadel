// file: ColorManager.cs
using UnityEngine;
using System.Collections;

public class ColorManager : MonoBehaviour {
	public delegate void ColorChangeHandler(Color newColor);
	public static event ColorChangeHandler onChangeColor;
	
	void OnGUI(){
		bool makeGreenButtonClicked = GUILayout.Button("make things GREEN");	
		bool makeBlueButtonClicked = GUILayout.Button("make things BLUE");	
		bool makeRedButtonClicked = GUILayout.Button("make things RED");	

		if(makeGreenButtonClicked)
			PublishColorEvent( Color.green );

		if(makeBlueButtonClicked)
			PublishColorEvent( Color.blue );

		if(makeRedButtonClicked)
			PublishColorEvent( Color.red );
	}
	
	private void PublishColorEvent(Color newColor){
		// if there is at least one listener to this delegate
		if( onChangeColor != null){
			// broadcast change colour event 
			onChangeColor( newColor );
		}
	}
}
