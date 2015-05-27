// file: MakeCubeActive.cs
using UnityEngine;
using System.Collections;

public class MakeCubeActive : MonoBehaviour {
	public GameObject cubeGO;
	
	private void OnGUI(){
		bool makeCubeActiveButtonClicked = GUILayout.Button("make cube active");
		if( makeCubeActiveButtonClicked )
			cubeGO.active = true;
	}

}
