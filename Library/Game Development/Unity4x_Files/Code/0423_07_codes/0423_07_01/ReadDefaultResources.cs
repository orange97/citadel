// file: ReadDefaultResources.cs
using UnityEngine;
using System.Collections;

public class ReadDefaultResources : MonoBehaviour {
	public string fileName = "externalTexture";
	private Texture2D externalImage;

	private void Start () {
		externalImage = (Texture2D)Resources.Load(fileName);
	}
	
	private void OnGUI() {
		GUILayout.Label(externalImage);
	}
}
