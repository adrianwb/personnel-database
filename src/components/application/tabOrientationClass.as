package components.application
{
	import packages.tabCanvasClass;
	import mx.controls.CheckBox;
	import mx.controls.TextInput;
	import packages.DateUtils;
	import packages.ComboBoxNew;
	import mx.controls.DateField;	
	import mx.controls.Button;
	import mx.collections.ArrayCollection;
	import flash.events.DataEvent;
	import flash.events.IOErrorEvent;
	import mx.controls.Alert;
	import mx.rpc.http.mxml.HTTPService;
	import mx.managers.PopUpManager;

	public class tabOrientationClass extends tabCanvasClass
	{
		public function tabOrientationClass()
		{
			super();
			defaultListHeight = 65;
			expandedListHeight = 135;
		}
		
		include "../orientationCommon.as";		
	}
}