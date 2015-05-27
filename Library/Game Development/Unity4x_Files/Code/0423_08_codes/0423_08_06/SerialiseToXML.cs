// file: SerialiseToXML.cs
using UnityEngine; 
using System.Collections; 
using System.Collections.Generic;

public class SerialiseToXML : MonoBehaviour {
	private string output = "(nothing yet)";
	
	void Start () { 
		SerializeManager<PlayerScore2> serializer = new SerializeManager<PlayerScore2>();
		PlayerScore2 myData = new PlayerScore2("matt", 200);
		output = serializer.SerializeObject(myData);
	} 
 
	void OnGUI() {
		output = output.Replace("<","\n<");
		output = output.Replace("\n\n","\n");
		GUILayout.Label( output );
	}
}
